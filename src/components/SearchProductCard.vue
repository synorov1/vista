<template>
  <div class="search-product-card">
    <div class="image" />
    <div class="card">
      <div class="name">
        Название товара
      </div>
      <div class="info">
        <div class="rating">
          <svg
            width="14"
            height="15"
            viewBox="0 0 14 15"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M5.00722 2.88586C5.89386 1.29529 6.33723 0.5 7.00004 0.5C7.66285 0.5 8.10613 1.29529 8.99277 2.88586L9.22219 3.29736C9.4741 3.74935 9.60011 3.97535 9.79654 4.12447C9.99298 4.27358 10.2376 4.32893 10.7269 4.43963L11.1723 4.54042C12.8941 4.92998 13.755 5.12477 13.9598 5.78342C14.1646 6.44203 13.5778 7.12838 12.404 8.50091L12.1002 8.85607C11.7667 9.24606 11.5999 9.44109 11.5249 9.68242C11.4499 9.92366 11.4751 10.1839 11.5255 10.7042L11.5714 11.1781C11.7489 13.0094 11.8377 13.9251 11.3014 14.3322C10.7652 14.7392 9.95912 14.368 8.34702 13.6258L7.92999 13.4338C7.47184 13.2228 7.24285 13.1174 7.00004 13.1174C6.75723 13.1174 6.52815 13.2228 6.07009 13.4338L5.65297 13.6258C4.04087 14.368 3.23483 14.7392 2.69861 14.3322C2.16238 13.9251 2.25112 13.0094 2.42858 11.1781L2.47449 10.7042C2.52492 10.1839 2.55013 9.92366 2.47511 9.68242C2.40008 9.44109 2.2333 9.24606 1.89974 8.85607L1.59608 8.50091C0.422279 7.12838 -0.164619 6.44203 0.0401926 5.78342C0.245013 5.12477 1.1059 4.92998 2.82768 4.54042L3.27313 4.43963C3.76236 4.32893 4.00701 4.27358 4.20345 4.12447C4.39989 3.97535 4.52589 3.74935 4.7778 3.29736L5.00722 2.88586Z" fill="#FFA763" />
          </svg>
          <p>3.8 <span>- 3 214 оценки</span></p>
        </div>
        <div class="status">
          <div class="pin" />
          <span>В наличии</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">

</script>

<style scoped>
.search-product-card {
  display: flex;
  align-items: center;
  gap: 16px;
}

.image {
  height: 71px;
  width: 71px;
  border-radius: 10px;
  border: 1px solid #d9d9d9;
  background: #fff;
}

.card {
  display: flex;
  flex-direction: column;
  gap: 6px;
  border: unset;
}

.name {
  font-family: Inter;
font-weight: 700;
font-size: 16px;
line-height: 100%;
letter-spacing: -2%;
color: #000000;

}

.info {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.rating {
  display: flex;
  align-items: center;
  gap: 4px;
}

.rating p {
  margin: 0;
  font-weight: 700;
  font-size: 14px;
  line-height: 100%;
  letter-spacing: 0;
}

.rating span {
  color: #A0A0A0;
  font-weight: 400;
}

.pin {
  height: 14px;
  width: 14px;
  position: relative;
  padding: 4px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.pin:after {
  width: 10px;
  height: 10px;
  content: '';
  position: absolute;
  background: #8CFF63;
  border-radius: 100%;
}

.status {
  display: flex;
  align-items: center;
  gap: 4px;
  font-weight: 700;
  font-size: 14px;
  line-height: 100%;
  letter-spacing: 0;
  color: #000;
}
</style>