<div>
    {{-- 検索フォーム --}}
    <form wire:submit.prevent="search" class="search-form">
        <input type="text" wire:model="searchTextInput" placeholder="名前やメールアドレスを入力してください">

        <select wire:model="searchGenderInput">
            <option value="">性別</option>
            <option value="all">全て</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
            <option value="3">その他</option>
        </select>

        <select wire:model="searchCategoryInput">
            <option value="">お問い合わせの種類</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->content }}
            </option>
            @endforeach
        </select>

        <input type="date" wire:model="searchDateInput">

        <button type="submit">検索</button>
        <button type="button" wire:click="resetFilters">リセット</button>
    </form>

    {{-- ページネーション --}}
    <div class="pagination">
        {{ $contacts->links() }}
    </div>

    {{-- 一覧表示 --}}
    <table class="contacts-table">
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->full_name }}</td>
            <td>{{ $contact->gender_label }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content }}</td>
            <td><button wire:click="showDetail( {{ $contact->id }} )">詳細</button></td>
        </tr>
        @endforeach
    </table>

    {{-- モーダル --}}
    @if ($selectedContact)
    <div class="modal">
        <div class="modal-content">
            <button class="close" type="button" wire:click="closeModal">×</button>

            <table>
                <tr>
                    <th>お名前</th>
                    <td>{{ $selectedContact->full_name }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>{{ $selectedContact->gender_label }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $selectedContact->email }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $selectedContact->tel }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $selectedContact->address }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $selectedContact->building }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $selectedContact->category->content }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ $selectedContact->detail }}</td>
                </tr>
            </table>

            <button class="delete" type="button" wire:click="delete({{ $selectedContact->id }})">削除</button>
        </div>
    </div>
    @endif
</div>