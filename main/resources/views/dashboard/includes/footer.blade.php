<!-- ======= Footer ======= -->
<footer id="footer" class="footer mt-auto ">
    <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

{{-- bootstrap js --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    function getImage() {
        console.log('first')
        console.log(inputImage)

    }

    const input = document.getElementById('uploadImage');
    const inputUpdate = document.getElementById('updateImage');
    // input.addEventListener('change', previewPhoto);

    // const inputImage= document.getElementById('uploadImage').value;
    const preview = document.getElementById('preview-images');
    // const previewUpdate = document.getElementById('preview-update-images');


    document.getElementById('addPortfolioBtn').addEventListener('click',()=>{
        preview.innerHTML =''
    })
    document.getElementById('updateImageBtn').addEventListener('change',()=>{
        previewUpdate.innerHTML =''
    })
    const previewPhoto = () => {
        const files = input.files;
        console.log(files);
        for(const idx in files) {
                const file = files[idx];
                console.log(file)
                if (file) {
                    const fileReader = new FileReader();
                    const id='file-preview'+idx
                    const img=document.createElement('img')
                    img.classList.add('img-fluid')
                    img.classList.add('mx-auto')
                    img.classList.add('text-center')
                    img.style.height='200px'
                    // <img src="#" style="height: 200px" class="d-none img-fluid mx-auto text-center"
                    //             alt="Preview Uploaded Image" id="file-preview0">
                    //         <img src="#" style="height: 200px" class="d-none img-fluid mx-auto text-center"
                    //             alt="Preview Uploaded Image" id="file-preview1">
                    //         <img src="#" style="height: 200px" class="d-none img-fluid mx-auto text-center"
                    //             alt="Preview Uploaded Image" id="file-preview2">
                    // console.log(preview)
                    fileReader.onload = function(event) {
                        img.setAttribute('src', event.target.result);
                        preview.appendChild(img);
                        // preview.classList.remove('d-none');
                    }
                    fileReader.readAsDataURL(file);
                }
        }
    }
    const previewDistroy = (id)=>{
        const previewUpdate = document.getElementById('preview-update-images'+id);
        previewUpdate.innerHTML="";
    }
    const previewPhotoUpdatePhoto = (id) => {
        console.log(id)
        const previewUpdate = document.getElementById('preview-update-images'+id);
        const files = document.getElementById('updateImage'+id).files;
        console.log('updateImage'+id)
        console.log(files);
        for(const idx in files) {
                const file = files[idx];
                // console.log(file)
                if (file) {
                    const fileReader = new FileReader();
                    // const id='file-preview'+idx
                    const img=document.createElement('img')
                    img.classList.add('img-fluid')
                    img.classList.add('mx-auto')
                    img.classList.add('text-center')
                    img.style.height='200px'
                    // <img src="#" style="height: 200px" class="d-none img-fluid mx-auto text-center"
                    //             alt="Preview Uploaded Image" id="file-preview0">
                    //         <img src="#" style="height: 200px" class="d-none img-fluid mx-auto text-center"
                    //             alt="Preview Uploaded Image" id="file-preview1">
                    //         <img src="#" style="height: 200px" class="d-none img-fluid mx-auto text-center"
                    //             alt="Preview Uploaded Image" id="file-preview2">
                    // console.log(preview)
                    fileReader.onload = function(event) {
                        img.setAttribute('src', event.target.result);
                        previewUpdate.appendChild(img);
                        // preview.classList.remove('d-none');
                    }
                    fileReader.readAsDataURL(file);
                }
        }
    }
    input.addEventListener("change", previewPhoto);
    // inputUpdate.addEventListener("change", previewPhotoUpdatePhoto);
//     const up=document.getElementsByClassName('update_images');
//     for (const iterator of up) {
// iterator.addEventListener("change", previewPhotoUpdatePhoto);
//     }
    // console.log(up)
</script>
</body>

</html>
