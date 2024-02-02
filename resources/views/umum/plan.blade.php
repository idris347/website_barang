@extends('tampilan.layout')
@section('content')
<style>
    .fa-wrench {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }

    .fade-in {
        opacity: 0;
        transform: translateX(20px);
        animation: fadeInAnimation 1s ease-in-out forwards;
    }

    @keyframes fadeInAnimation {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .mainwrapper {
            background: #fefefe;
            display: flex;
            width: 100%;
            height: 650px;
            justify-content: center;
            align-items: center;
        }

        img.imgthumb {
            width: 150px;
            border-radius: 10px;
        }

        /* overlay by webprogramminunpas and modified by nelayankode.com*/
        .overlay {
            width: 0;
            height: 0;
            overflow: hidden;
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0);
            z-index: 9999;
            transition: .8s;
            text-align: center;
            padding: 150px 0;
        }

        .overlay:target {
            width: auto;
            height: auto;
            bottom: 0;
            right: 0;
            background: rgba(0, 0, 0, .7);
        }

        .overlay img {
            max-height: 100%;
            box-shadow: 2px 2px 7px rgba(0, 0, 0, .5);
        }

        .overlay:target img {
            animation: zoomDanFade 1s;
        }

        .overlay .close {
            position: absolute;
            top: 2%;
            right: 2%;
            margin-left: -20px;
            color: white;
            text-decoration: none;
            line-height: 14px;
            padding: 5px;
            opacity: 0;
        }

        .overlay:target .close {
            animation: slideDownFade .5s .5s forwards;
        }

        /* animasi */
        @keyframes zoomDanFade {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes slideDownFade {
            0% {
                opacity: 0;
                margin-top: -20px;
            }

            100% {
                opacity: 1;
                margin-top: 0;
            }
        }
        .text {
        flex: 1;
        padding: 0 20px;
    }
</style>
<h3 class="page-title text-white mt-2"><i class="fas fa-wrench"></i>&nbsp;Planogram</h3>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="content">
                <div class="container">
                  <h2 class="my-5 text-center fade-in">Sketsa </h2>
                  <div class="d-md-flex testimony-29101 align-items-stretch">
                    <a href="#gambar-2" style="width: 47%">
                      <img src="plano_den.png" style="width: 100%" alt="denah" class="fade-in thumb"></a>                 
                       <div class="text fade-in">                   
                        <blockquote>
                          <div class="author">&mdash; Denah Planogram gudang </div>
                          <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, at! Atque totam obcaecati veniam eius vero, similique quibusdam! Sunt sequi, nemo. Quam consequuntur ipsum suscipit repellat molestiae laboriosam, incidunt!&rdquo;</p>
                        </blockquote>
                      </div>
                  </div> <br>
                  <div class="d-md-flex testimony-29101 align-items-stretch mt-5">
                    <a href="#gambar-1">
                    <img src="pipa_planogram.jpg" style="width: 76%" alt="denah" class="fade-in thumb"></a>                 
                     <div class="text fade-in">
                      <blockquote>
                        <div class="author">&mdash; Pipa PVC</div>
                        <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, at! Atque totam obcaecati veniam eius vero, similique quibusdam! Sunt sequi, nemo. Quam consequuntur ipsum suscipit repellat molestiae laboriosam, incidunt!&rdquo;</p>
                      </blockquote>
                    </div>
                  </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay" id="gambar-1">
  <a href="#" class="close">
      <svg style="width:47px;height:47px" viewBox="0 0 24 24">
          <path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
      </svg>
  </a>
  <img src="pipa_planogram.jpg" alt="Nelayan Kode">
</div>
<div class="overlay" id="gambar-2">
  <a href="#" class="close">
      <svg style="width:47px;height:47px" viewBox="0 0 24 24">
          <path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
      </svg>
  </a>
  <img src="plano_den.png" alt="Nelayan Kode">
</div>
@endsection
