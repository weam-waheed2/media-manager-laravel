<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .modal-header{border: none;display: block;background: #5272D7;color: white;text-transform: capitalize;border-radius: none;}.modal-header .btn-close {position: absolute;top: 20px;right: 20px;background: #dc0a35;opacity: 1;border-radius: 50%;}.btn-close {width: 1.5em;height: 1.5em;color: white;}.btn-close:hover{color: white;}.btn-close:focus{box-shadow: none;}@media (min-width: 1200px){.modal-xl {--bs-modal-width: 1760px;}}.nav-media {display: block;}.nav-link{padding: 5px 12px;}.nav-tabs > li {float:none;display:inline-block;zoom:1;}.nav-tabs {text-align:center;border: none;}.modal-body {background: #edebf5;}.nav-pills .nav-link-media.active, .nav-pills .show>.nav-link{background-color: white;color: black;border-color: white;border-radius: 7px;}.nav-pills .nav-link-media{border: 2px solid white;color: white;}.nav-tabs .nav-link-media:hover{background-color: #d4d4d4;border: 2px solid #d4d4d4;color: rgb(0, 0, 0);}.fs-5 {font-size: 1.5rem!important;}.border-image-manager{width: 100%;height: 140px;border: 10px solid #ffffff85;border-radius: 5px;overflow: hidden;position: relative;}.border-image-manager img{background-color: #1392cf12;background-size: cover;background-position: center;width: 100%;height: 100%;height: 140px;cursor: pointer;object-fit: cover;}.menu-active{border-color: #3250b1;transition: 1s;}.active>.page-link , .page-link.active{background-color: #3250b1 !important;border-color: #3250b1 !important;color: white !important;}.page-link {color: #3250b1 !important;}.action-media{position: absolute;top: 5px;left: 5px;}.btn-media{font-size: 12px;font-weight: 500;background-color: #ddd;color: #000;text-decoration: none;display: inline-block;padding: 5px 15px;cursor: pointer;transition: all .5s;box-shadow: 0 4px 15px rgb(0 0 0 / 15%);border: none;color: white;}.select{background-color:#3250b1 ;border-radius: 30px;}.editbtn{background-color:#32b191 ;border-radius: 50%;width: 2rem;height: 2rem;padding: 5px;position: absolute;}.cropbtn{background-color:#32b191 ;border-radius: 50%;width: 2rem;height: 2rem;padding: 5px;}.deletebtn {position: absolute;top: 78px;left: 1px;border-radius: 50%;width: 2rem;height: 2rem;padding: 5px;background: crimson;}.input-select {border-bottom-right-radius: 0 !important;border-top-right-radius: 0 !important;}.btnadd {margin: 6px 0;background: #5272D7;color: white;border: none;border-top-right-radius: 7px;border-bottom-right-radius: 7px;}.btn-upload-media{border: none;background-color: #3250b1;color: white;padding: 5px 15px;border-radius: 7px;}#preview-image{border-radius: 15px;filter: brightness(0.5);}.form-input {padding: 7px 20px;width: 100%;border-radius: 7px;background-color: #f8f8f8;margin: 6px 0;border: 1px solid #c4c4c4;}.form-input:focus-visible {outline: #2e4764c2;}.form-input:focus {border: 1px solid #2e4764c2;}.form-selecter {padding: 10px 20px;width: 100%;border-radius: 7px;background-color: #f8f8f8;margin: 10px 0;border: 1px solid #c4c4c4;text-transform: capitalize;}.form-selecter:focus-visible {outline: #2e4764c2;}.form-selecter:focus {border: 1px solid #2e4764c2;}.title-form {text-transform: capitalize;font-size: 15px;font-weight: 600;color: rgb(109, 109, 109);}.true-select{position: absolute;top: 0px;left: 37px;font-size: 68px;color: #6280e1e6;}
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    </head>
    <body class="antialiased">

        <div class="container my-5">
            <div class="row">
                <div class="col-lg-9 m-auto">
                    <div class="my-3">
                        <label class="title-form" for="image">image :</label>
                        <input type="file" name="file" id="file" hidden class="file">
                        <div class="d-flex">
                            <input type="hidden" id="idselect" value="">
                            <input type="text" hidden value="<?php echo e(old('image')); ?>" name="image" id="imageselect" class="filenameselect form-input"
                                readonly="readonly">
                            <button type="button" class="my-2 btn-upload-media w-100 text-center" data-bs-toggle="modal" data-bs-target="#exampleModal" id="featureimageselect">select</button>
                        </div>
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="form-error text-danger pt-1" style="font-size: 13px;font-weight: 600">
                                <i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 m-auto">
                    <div class="mb-2 m-auto">
                        <?php if(old('image')): ?>
                            <img id="preview-image-before-upload" src="<?php echo e(old('image')); ?>"
                                alt="preview image" width="100%">
                        <?php else: ?>
                        <img id="preview-image-before-upload" src="<?php echo e(asset('no-photo.jpg')); ?>"
                                alt="preview image" width="100%">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        
        <?php echo $__env->make('media.includemedia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\media_manager\resources\views/index.blade.php ENDPATH**/ ?>