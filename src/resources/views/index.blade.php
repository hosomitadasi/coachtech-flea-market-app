@extends('layouts.app')

@section('main')
<div class="toppage-list">
    <button class="tab" id="recommend-tab" onclick="toggleTab('recommend')">おすすめ</button>
    <button class="tab" id="mylist-tab" onclick="toggleTab('mylist')">マイリスト</button>
</div>
<hr class="divider">
<div class="products-list" id="products-list">
    @foreach ($items as $item)
    <div class="products-card">
        <a href="{{ route('detail', ['item_id' => $item->id]) }}">
            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="product-image">
        </a>
        <div class="product-name">{{ $item->name }}</div>
        @if ($item->is_sold)
        <div class="sold-overlay">Sold</div>
        @endif
    </div>
    @endforeach
</div>

<script>
    function toggleTab(tab) {
        const recommendTab = document.getElementById('recommend-tab');
        const mylistTab = document.getElementById('mylist-tab');
        if (tab === 'recommend') {
            recommendTab.style.color = '#ff0000';
            mylistTab.style.color = '#5f5f5f';
        } else {
            recommendTab.style.color = '#5f5f5f';
            mylistTab.style.color = '#ff0000';
        }

        // Fetch and display the items based on the selected tab
        fetchItems(tab);
    }

    function fetchItems(tab) {
        let url = '/';
        if (tab === 'mylist') {
            url += '?page=mylist';
        }

        fetch(url)
            .then(response => response.json())
            .then(data => {
                const productsList = document.getElementById('products-list');
                productsList.innerHTML = '';

                data.items.forEach(item => {
                    const productCard = document.createElement('div');
                    productCard.classList.add('products-card');

                    const productLink = document.createElement('a');
                    productLink.href = `/item/${item.id}`;

                    const productImage = document.createElement('img');
                    productImage.src = item.image_url;
                    productImage.alt = item.name;
                    productImage.classList.add('product-image');

                    productLink.appendChild(productImage);
                    productCard.appendChild(productLink);

                    const productName = document.createElement('div');
                    productName.classList.add('product-name');
                    productName.textContent = item.name;

                    productCard.appendChild(productName);

                    if (item.is_sold) {
                        const soldOverlay = document.createElement('div');
                        soldOverlay.classList.add('sold-overlay');
                        soldOverlay.textContent = 'Sold';
                        productCard.appendChild(soldOverlay);
                    }

                    productsList.appendChild(productCard);
                });
            });
    }
</script>

@endsection