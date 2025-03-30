<template>
  <div class="cart">
    <div class="cart-header">
      <h1>Корзина</h1>
      <span class="cart-count">1 товар</span>
    </div>

    <div class="discount-banner">
      <div class="discount-info">
        <div class="discount-icon">
          <svg 
            width="17" 
            height="16" 
            viewBox="0 0 17 16" 
            fill="none"
          >
            <path d="M15.1666 6.91667V4.75C15.1666 4.19167 14.7249 3.75 14.1666 3.75H11.9999L10.3333 1.25C10.0166 0.75 9.31659 0.75 8.99992 1.25L7.33325 3.75H5.16659C4.60825 3.75 4.16659 4.19167 4.16659 4.75V6.91667L1.66659 8.58333C1.16659 8.9 1.16659 9.6 1.66659 9.91667L4.16659 11.5833V13.75C4.16659 14.3083 4.60825 14.75 5.16659 14.75H7.33325L8.99992 16.5833C9.31659 17.0833 10.0166 17.0833 10.3333 16.5833L11.9999 14.75H14.1666C14.7249 14.75 15.1666 14.3083 15.1666 13.75V11.5833L17.6666 9.91667C18.1666 9.6 18.1666 8.9 17.6666 8.58333L15.1666 6.91667ZM8.99992 12.4167C7.06659 12.4167 5.49992 10.85 5.49992 8.91667C5.49992 6.98333 7.06659 5.41667 8.99992 5.41667C10.9333 5.41667 12.4999 6.98333 12.4999 8.91667C12.4999 10.85 10.9333 12.4167 8.99992 12.4167Z" fill="#FF4433"/>
          </svg>
        </div>
        <span>Получите скидку 5% - просто добавьте товара еще на 12 442 ₽</span>
      </div>
      <button class="add-btn">Добавить</button>
    </div>

    <div class="product-card">
      <div class="product-image">
        <img src="@/assets/images/joola-1.jpg" alt="Product" />
      </div>
      <div class="product-info">
        <h2>Накладка DONIC BlueStar A1</h2>
        <div class="price-block">
          <span class="current-price">6 750 ₽</span>
          <span class="old-price">20 000 ₽</span>
        </div>
        <div class="product-options">
          <span class="option">Цвет: Черный</span>
          <span class="option">Размер: Max</span>
        </div>
        <div class="additional-services">
          <span>Дополнительные услуги:</span>
          <button class="service-btn">
            <svg 
              width="12" 
              height="12" 
              viewBox="0 0 12 12" 
              fill="none"
            >
              <path 
                d="M6 1V11M1 6H11" 
                stroke="white" 
                stroke-width="2" 
                stroke-linecap="round"
              />
            </svg>
            Сборка ракетки
          </button>
        </div>
      </div>
      <div class="product-controls">
        <div class="quantity-controls">
          <button class="control-btn">-</button>
          <span>1</span>
          <button class="control-btn">+</button>
        </div>
        <div class="action-buttons">
          <button class="icon-btn">
            <svg 
              width="20" 
              height="20" 
              viewBox="0 0 20 20" 
              fill="none"
            >
              <path 
                d="M10 18.3334C14.6024 18.3334 18.3334 14.6024 18.3334 10C18.3334 5.39765 14.6024 1.66669 10 1.66669C5.39765 1.66669 1.66669 5.39765 1.66669 10C1.66669 14.6024 5.39765 18.3334 10 18.3334Z" 
                stroke="#A0A0A0" 
                stroke-width="1.5" 
                stroke-linecap="round" 
                stroke-linejoin="round"
              />
              <path 
                d="M6.66669 10L8.33335 11.6667L13.3334 6.66669" 
                stroke="#A0A0A0" 
                stroke-width="1.5" 
                stroke-linecap="round" 
                stroke-linejoin="round"
              />
            </svg>
          </button>
          <button class="icon-btn">
            <svg 
              width="20" 
              height="20" 
              viewBox="0 0 20 20" 
              fill="none"
            >
              <path 
                d="M2.5 5H17.5" 
                stroke="#A0A0A0" 
                stroke-width="1.5" 
                stroke-linecap="round" 
                stroke-linejoin="round"
              />
              <path 
                d="M15.8334 5V16.6667C15.8334 17.5 15 18.3333 14.1667 18.3333H5.83335C5.00002 18.3333 4.16669 17.5 4.16669 16.6667V5" 
                stroke="#A0A0A0" 
                stroke-width="1.5" 
                stroke-linecap="round" 
                stroke-linejoin="round"
              />
              <path 
                d="M6.66669 5V3.33333C6.66669 2.5 7.50002 1.66667 8.33335 1.66667H11.6667C12.5 1.66667 13.3334 2.5 13.3334 3.33333V5" 
                stroke="#A0A0A0" 
                stroke-width="1.5" 
                stroke-linecap="round" 
                stroke-linejoin="round"
              />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <button class="share-btn">Поделиться корзиной</button>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.cart {
  padding: 20px;
  background: #FFFFFF;
  border: 1px solid #D9D9D9;
  border-radius: 20px;
  max-width: 1440px;
  margin: 0 auto;
}

.cart-header {
  display: flex;
  flex-direction: column;
  gap: 6px;
  margin-bottom: 20px;
}

.cart-header h1 {
  font-weight: 800;
  font-size: 24px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
  margin: 0;
}

.cart-count {
  font-weight: 600;
  font-size: 14px;
  line-height: 1.21;
  color: #A0A0A0;
}

.discount-banner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 14px 16px;
  background: #FFFFFF;
  border: 1px solid #D9D9D9;
  border-radius: 6px;
  margin-bottom: 20px;
}

.discount-info {
  display: flex;
  align-items: center;
  gap: 10px;
}

.discount-icon {
  width: 24px;
  height: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.add-btn {
  font-weight: 600;
  font-size: 14px;
  line-height: 1.21;
  color: #0084FF;
  background: none;
  border: none;
  cursor: pointer;
}

.product-card {
  display: flex;
  gap: 20px;
  margin-bottom: 20px;
}

.product-image {
  width: 140px;
  height: 140px;
  border: 1px solid #D9D9D9;
  border-radius: 14px;
  overflow: hidden;
}

.product-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.product-info {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.product-info h2 {
  font-weight: 700;
  font-size: 16px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
  margin: 0;
}

.price-block {
  display: flex;
  align-items: center;
  gap: 10px;
}

.current-price {
  font-weight: 800;
  font-size: 16px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #0084FF;
}

.old-price {
  font-weight: 600;
  font-size: 12px;
  line-height: 1.21;
  color: #A0A0A0;
  text-decoration: line-through;
}

.product-options {
  display: flex;
  gap: 10px;
}

.option {
  padding: 6px 10px;
  background: #F0F0F0;
  border-radius: 30px;
  font-weight: 500;
  font-size: 14px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #A0A0A0;
}

.additional-services {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.additional-services span {
  font-weight: 500;
  font-size: 14px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #A0A0A0;
}

.service-btn {
  display: flex;
  align-items: center;
  gap: 4px;
  padding: 6px 10px 6px 6px;
  background: #0084FF;
  border-radius: 30px;
  border: none;
  font-weight: 500;
  font-size: 14px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #FFFFFF;
  cursor: pointer;
  width: fit-content;
}

.product-controls {
  display: flex;
  flex-direction: column;
  gap: 50px;
}

.quantity-controls {
  display: flex;
  align-items: center;
}

.control-btn {
  width: 32px;
  height: 32px;
  background: #F0F0F0;
  border-radius: 12px;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  color: #A0A0A0;
  cursor: pointer;
}

.quantity-controls span {
  font-weight: 500;
  font-size: 20px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
  margin: 0 10px;
}

.action-buttons {
  display: flex;
  gap: 10px;
}

.icon-btn {
  width: 32px;
  height: 32px;
  background: #F0F0F0;
  border-radius: 12px;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.share-btn {
  width: 100%;
  padding: 14px;
  background: #F0F0F0;
  border-radius: 6px;
  border: none;
  font-weight: 600;
  font-size: 14px;
  line-height: 1.21;
  color: #A0A0A0;
  cursor: pointer;
}

@media (max-width: 1024px) {
  .cart {
    max-width: 1024px;
  }

  .product-card {
    max-width: 596px;
  }
}

@media (max-width: 720px) {
  .cart {
    max-width: 720px;
  }

  .product-card {
    flex-direction: column;
    max-width: 648px;
  }

  .product-controls {
    flex-direction: row;
    justify-content: space-between;
    gap: 20px;
  }
}

@media (max-width: 320px) {
  .cart {
    max-width: 320px;
    padding: 16px;
    border-radius: 16px;
  }

  .discount-banner {
    flex-direction: column;
    gap: 10px;
    align-items: flex-start;
  }

  .product-card {
    gap: 16px;
  }

  .product-image {
    width: 100%;
    height: auto;
    aspect-ratio: 1;
  }

  .product-options {
    flex-wrap: wrap;
  }

  .product-controls {
    width: 100%;
  }
}
</style> 