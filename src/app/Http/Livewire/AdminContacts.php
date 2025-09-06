<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;
use App\Models\Category;

class AdminContacts extends Component
{
    use WithPagination;

    // 検索欄入力用
    public $searchTextInput = '';
    public $searchGenderInput = '';
    public $searchCategoryInput = '';
    public $searchDateInput = '';

    // 実際の検索条件
    public $searchText = '';
    public $searchGender = '';
    public $searchCategory = '';
    public $searchDate = '';

    public $selectedContact = null;
    protected $paginationTheme = 'bootstrap';

    // ページネーションのリセット
    public function updatingSearchText()
    {
        $this->resetPage();
    }
    public function updatingSearchGender()
    {
        $this->resetPage();
    }
    public function updatingSearchCategory()
    {
        $this->resetPage();
    }
    public function updatingSearchDate()
    {
        $this->resetPage();
    }

    // 検索と表示
    public function render()
    {
        $query = Contact::with('category');

        if ($this->searchText !== '') {
            $query->where(function ($q) {
                $q->where('first_name', 'like', "%{$this->searchText}%")
                    ->orWhere('last_name', 'like', "%{$this->searchText}%")
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$this->searchText}%"])
                    ->orWhere('email', 'like', "%{$this->searchText}%");
            });
        }

        if ($this->searchGender !== '' && $this->searchGender !== 'all') {
            $query->where('gender', $this->searchGender);
        }

        if ($this->searchCategory !== '') {
            $query->where('category_id', $this->searchCategory);
        }

        if ($this->searchDate !== '') {
            $query->whereDate('created_at', $this->searchDate);
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(7);

        return view('livewire.admin-contacts', [
            'contacts' => $contacts,
            'categories' => Category::all(),
        ]);
    }

    // 検索ボタン
    public function search()
    {
        $this->searchText = $this->searchTextInput;
        $this->searchGender = $this->searchGenderInput;
        $this->searchCategory = $this->searchCategoryInput;
        $this->searchDate = $this->searchDateInput;
        $this->resetPage();
    }

    // リセットボタン
    public function resetFilters()
    {
        $this->searchTextInput = '';
        $this->searchGenderInput = '';
        $this->searchCategoryInput = '';
        $this->searchDateInput = '';

        $this->searchText = '';
        $this->searchGender = '';
        $this->searchCategory = '';
        $this->searchDate = '';

        $this->resetPage();
    }

    public function export()
    {
        $query = Contact::with('category');

        if ($this->searchText !== '') {
            $query->where(function ($q) {
                $q->where('first_name', 'like', "%{$this->searchText}%")
                    ->orWhere('last_name', 'like', "%{$this->searchText}%")
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$this->searchText}%"])
                    ->orWhere('email', 'like', "%{$this->searchText}%");
            });
        }

        if ($this->searchGender !== '' && $this->searchGender !== 'all') {
            $query->where('gender', $this->searchGender);
        }

        if ($this->searchCategory !== '') {
            $query->where('category_id', $this->searchCategory);
        }

        if ($this->searchDate !== '') {
            $query->whereDate('created_at', $this->searchDate);
        }

        $contacts = $query->get();

        $csvHeader = ['ID', 'お名前', '性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問い合わせの種類', 'お問い合わせ内容', '作成日'];
        $callback = function() use ($contacts, $csvHeader) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $csvHeader);

            foreach ($contacts as $c) {
                fputcsv($file, [
                    $c->id,
                    $c->full_name,
                    $c->gender_label,
                    $c->email,
                    $c->tel,
                    $c->address,
                    $c->building,
                    $c->category->content,
                    $c->detail,
                    $c->created_at,
                ]);
            }
            fclose($file);
        };

        return response()->streamDownload($callback, 'contacts.csv');
    }

    // モーダル
    public function showDetail($id)
    {
        $this->selectedContact = Contact::with('category')->find($id);
    }

    public function closeModal()
    {
        $this->selectedContact = null;
    }

    // モーダル内削除機能
    public function delete($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
        }
        $this->closeModal();
        $this->resetPage();
    }
}
