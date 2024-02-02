@extends('tampilan.layout')
@section('content')
<style>.section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;

}
.content-container {
    margin-top: -100px; /* Adjust this value based on your navigation bar's height */
}
.about-name {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 10px;
}

.about-job-title {
    font-size: 20px;
    color: #777;
    margin-bottom: 20px;
}

/* Style for the table */
.about-table {
    width: 100%;
    border-collapse: collapse;
}

.about-table th,
.about-table td {
    padding: 10px;
    border: 1px solid #ccc;
}

.about-table th {
    background-color: #f5f5f5;
    text-align: left;
}
</style>
<style>
  .fa-cubes {
      font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
  }
</style>
<div class="content-container bg-white">
  <h4 class="page-title text-white mt-2" ><i class="fas fa-cubes mr-2 fa-3x"></i>Galeri</h4>
        <div  class="row align-items-center flex-row-reverse">
          <div class="col-lg-6">
            <div class="about-text go-to">
                <h4 class="about-name">Muhammad Idris A</h4>
                <h6 class="about-job-title">UI and UX Designer & Programmer</h6>
                <table class="about-table">
                    <tr>
                        <th colspan="2">Personal Information</th>
                    </tr>
                    <tr>
                        <td>Lahir</td>
                        <td>22 Mei 2002</td>
                    </tr>
                    <tr>
                        <td>Usia</td>
                        <td>21 Yr</td>
                    </tr>
                    <tr>
                        <td>Kenegaraan</td>
                        <td>Indonesia</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>jln, cagak cirenrdeu</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>muhammadidrisassyafei@gmail.com</td>
                    </tr>
                    <tr>
                        <td>NO Telepon</td>
                        <td>08997531538</td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td>43351</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>Mahasiswa</td>
                    </tr>
                </table>
            </div>
        </div>
          <div class="col-lg-6">
            <div class="about-avatar">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
            </div>
          </div>
        </div>
        <div class="counter">
          <div class="row">
            <div class="col-6 col-lg-3">
                <div class="count-data text-center">
                    <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                    <p class="m-0px font-w-600">Happy Clients</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="count-data text-center">
                    <h6 class="count h2" data-to="150" data-speed="150">10</h6>
                    <p class="m-0px font-w-600">Project Completed</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="count-data text-center">
                    <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                    <p class="m-0px font-w-600">Photo Capture</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="count-data text-center">
                    <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                    <p class="m-0px font-w-600">Telephonic Talk</p>
                </div>
            </div>          
          </div>
        </div>
</div>
@endsection