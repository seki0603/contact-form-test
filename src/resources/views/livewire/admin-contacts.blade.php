<div>
	{{-- 検索フォーム --}}
	<form class="search-form" wire:submit.prevent="search">
		<div class="search-form__text">
			<input type="text" wire:model="searchTextInput" placeholder="名前やメールアドレスを入力してください">
		</div>

		<div class="search-form__gender">
			<select wire:model="searchGenderInput">
				<option value="">性別</option>
				<option value="all">全て</option>
				<option value="1">男性</option>
				<option value="2">女性</option>
				<option value="3">その他</option>
			</select>
		</div>

		<div class="search-form__category">
			<select wire:model="searchCategoryInput">
				<option value="">お問い合わせの種類</option>
				@foreach ($categories as $category)
				<option value="{{ $category->id }}">
					{{ $category->content }}
				</option>
				@endforeach
			</select>
		</div>

		<div class="search-form__date">
			<input class="custom-date" type="date" wire:model="searchDateInput">
		</div>
		<div class="search-form__button">
			<button class="search-form__button-submit" type="submit">検索</button>
		</div>
		<div class="search-form__button">
			<button class="search-form__button-reset" type="button" wire:click="resetFilters">リセット</button>
		</div>
	</form>

	<div class="content__item">
		<div class="content__csv">
			<button>エクスポート</button>
		</div>
		<div class="content-pagination">
			{{ $contacts->links() }}
		</div>
	</div>

	{{-- 一覧表示 --}}
	<div class="content-table__wrapper">
		<table class="contact-table">
			<tr class="content-table__row">
				<th class="table__item-name">お名前</th>
				<th class="table__item-gender">性別</th>
				<th class="table__item-email">メールアドレス</th>
				<th class="table__item-category">お問い合わせの種類</th>
				<th></th>
			</tr>
			@foreach ($contacts as $contact)
			<tr class="content-table__row">
				<td class="table__item-name">
					{{ $contact->full_name }}
				</td>
				<td class="table-item-gender">
					{{ $contact->gender_label }}
				</td>
				<td class="table__item-email">
					{{ $contact->email }}
				</td>
				<td class="table__item-category">
					{{ $contact->category->content }}
				</td>
				<td class="table__item-button">
					<button wire:click="showDetail( {{ $contact->id }} )">
						詳細
					</button>
				</td>
			</tr>
			@endforeach
		</table>
	</div>

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