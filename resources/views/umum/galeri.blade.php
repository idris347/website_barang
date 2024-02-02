@extends('tampilan.layout')
@section('content')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&display=swap");

html {
  scroll-behavior: smooth;
}

body {
  margin: 0;
  padding: 0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background: #eee;
}

h1 {
  font-family: "Cinzel", serif;
  margin: 20px 0 0;
  font-size: 50px;
  color: #262626;
  font-weight: 400;
}

p {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  margin: 0 0 32px;
  color: #646464;
  font-weight: 200;
}

.image-container {
  -webkit-column-count: 3;
  -moz-column-count: 3;
  column-count: 3;
  -webkit-column-gap: 24px;
  -moz-column-gap: 24px;
  column-gap: 24px;
  padding: 0 40px;
}

.image-container div {
  position: relative;
  margin-bottom: 20px;
}

.image-container img {
  height: 500px;
  width: 100%;
  object-fit: cover;
  object-position: top;
}

.image-container div:first-child img,
.image-container div:nth-child(9) img,
.image-container div:nth-child(7) img,
.image-container div:nth-child(10) img {
  height: 560px;
}

.image-container div:nth-child(5) img {
  height: 360px;
}

.image-container div:nth-child(8) img {
  height: 700px;
  margin-bottom: 0;
}

.image-container div:nth-child(4) img {
  height: 560px;
  margin-bottom: 0;
}

.image-container div:last-child {
  margin-bottom: 0;
}

button.filters-cta {
  position: fixed;
  left: 50%;
  -webkit-transform: translate(-50%);
  transform: translate(-50%);
  bottom: 48px;
  right: auto;

  /* right: 16px;
            bottom: 40px; */
  height: 80px;
  width: 80px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  cursor: pointer;
  background: rgb(233 30 99 / 85%);
  color: #fff;
  border: 0;
  border-radius: 100%;
  z-index: 999;
}

button.filters-cta span {
  -webkit-transform: rotate(0deg) scale(1);
  transform: rotate(0deg) scale(1);
  -webkit-transition: linear 0.2s;
  transition: linear 0.2s;
  margin-top: 4px;
  font-size: 48px;
}

button.filters-cta:hover span {
  -webkit-transform: rotate(26deg) scale(1.1);
  transform: rotate(26deg) scale(1.1);
  -webkit-transition: linear 0.2s;
  transition: linear 0.2s;
  margin-left: -2px;
}

.filter-preset-1 {
  -webkit-filter: contrast(110%) brightness(110%) saturate(130%);
  filter: contrast(110%) brightness(110%) saturate(130%);
}

.filter-preset-2 {
  -webkit-filter: contrast(90%) brightness(120%) saturate(85%) hue-rotate(20deg);
  filter: contrast(90%) brightness(120%) saturate(85%) hue-rotate(20deg);
}

.filter-preset-3 {
  -webkit-filter: contrast(90%) brightness(110%) saturate(150%)
    hue-rotate(-10deg);
  filter: contrast(90%) brightness(110%) saturate(150%) hue-rotate(-10deg);
}

.filter-preset-4 {
  -webkit-filter: contrast(140%) sepia(50%);
  filter: contrast(140%) sepia(50%);
}

.filter-preset-5 {
  -webkit-filter: contrast(90%) brightness(110%);
  filter: contrast(90%) brightness(110%);
}

.filter-preset-6 {
  -webkit-filter: contrast(120%) saturate(125%);
  filter: contrast(120%) saturate(125%);
}

.filter-preset-7 {
  -webkit-filter: contrast(90%) sepia(20%);
  filter: contrast(90%) sepia(20%);
}

.filter-preset-8 {
  -webkit-filter: brightness(105%) hue-rotate(350deg);
  filter: brightness(105%) hue-rotate(350deg);
}

.filter-preset-9 {
  -webkit-filter: contrast(90%) brightness(120%) saturate(110%);
  filter: contrast(90%) brightness(120%) saturate(110%);
}

.filter-preset-10 {
  -webkit-filter: contrast(110%) brightness(110%) sepia(30%) grayscale(100%);
  filter: contrast(110%) brightness(110%) sepia(30%) grayscale(100%);
}

.filter-preset-11 {
  -webkit-filter: contrast(150%) saturate(110%);
  filter: contrast(150%) saturate(110%);
}

.filter-preset-12 {
  -webkit-filter: contrast(95%) brightness(95%) saturate(150%) sepia(25%);
  filter: contrast(95%) brightness(95%) saturate(150%) sepia(25%);
}

.filter-preset-13 {
  -webkit-filter: contrast(85%) brightness(110%) saturate(75%) sepia(22%);
  filter: contrast(85%) brightness(110%) saturate(75%) sepia(22%);
}

.filter-preset-14 {
  -webkit-filter: contrast(75%) brightness(115%) saturate(85%);
  filter: contrast(75%) brightness(115%) saturate(85%);
}

.filter-preset-15 {
  -webkit-filter: contrast(108%) brightness(108%) sepia(8%);
  filter: contrast(108%) brightness(108%) sepia(8%);
}

.filter-preset-16 {
  -webkit-filter: none !important;
  filter: none !important;
}

@media screen and (max-width: 1023px) {
  .image-container {
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    padding: 20px;
  }

  .image-container div:first-child img {
    height: 200px;
  }

  .image-container div:nth-child(5) img {
    height: 280px;
  }

  .image-container div:nth-child(8) img {
    height: 210px;
  }
}

@media screen and (max-width: 767px) {
  .image-container {
    -webkit-column-count: 1;
    -moz-column-count: 1;
    column-count: 1;
    padding: 0;
  }

  .image-container div img {
    height: 100vh !important;
    width: 100vw !important;
  }

  button.filters-cta {
    left: 50%;
    -webkit-transform: translate(-50%);
    transform: translate(-50%);
    bottom: 48px;
    right: auto;
  }
}
</style>
<style>
  .fa-cubes {
      font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
  }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-cubes mr-2 fa-3x"></i>Galeri</h4>

<div class="card">
    <div class="card-header">
      <button class="filters-cta">
        <span class="material-symbols-outlined">
          edit
        </span>
      </button>
    </div>
    <div class="image-container">
        <div>
            <img  src="{{ asset('midas') }}/assets/img/memantau.jpg" />
          </div>
        
          <div>
            <img src="{{ asset('midas') }}/assets/img/perbaiki_pipa.jpg" />
        
          </div>
        
          <div>
            <img src="{{ asset('midas') }}/assets/img/selesai_perbaikan.jpg" />
        
          </div>
        
          <div>
            <img src="{{ asset('midas') }}/assets/img/rijal.png" />
        
          </div>
        
          <div>
            <img src="https://images.unsplash.com/photo-1523824921871-d6f1a15151f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" />
          </div>
        
          <div>
            <img src="https://images.unsplash.com/photo-1531384441138-2736e62e0919?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" />
        
          </div>
    
            </div>
    <p style="margin: 20px 0;font-size:12px">Photo Credits: Unsplash</p>
  </div>
<script>
    let filterButton = document.querySelector("button.filters-cta");

const presets = [
  "filter-preset-1",
  "filter-preset-2",
  "filter-preset-3",
  "filter-preset-4",
  "filter-preset-5",
  "filter-preset-6",
  "filter-preset-7",
  "filter-preset-8",
  "filter-preset-9",
  "filter-preset-10",
  "filter-preset-11",
  "filter-preset-12",
  "filter-preset-13",
  "filter-preset-14",
  "filter-preset-15",
  "filter-preset-16"
];

filterButton.addEventListener("click", function () {
  let images = document.querySelectorAll(".image-container img");
  images.forEach((img) => {
    presets.forEach((preset) => {
      img.classList.remove(preset);
    });
    img.classList.add(getRandomPreset());
  });
});

function getRandomPreset() {
  const randomIndex = Math.floor(Math.random() * presets.length);
  return presets[randomIndex];
}</script>  
@endsection