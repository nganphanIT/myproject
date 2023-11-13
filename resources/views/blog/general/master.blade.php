@include('blog.general.header')
<main class="py-5">
    <div class="container">
         <div class="row">
            <div class="col-20">
                <div class="slideshow">
                    @yield('slideshow')
                </div>
            </div>
         </div>
         <div class="row">
            <div class="col-3">
                <aside>
                    @section('sidebar')
                    @show
                </aside>
            </div>
            <div class="col-9">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
     </div>
 </main>
@include('blog.general.footer')
<style>
    .py-5{
        background-color: white;
        background-size: cover;
        height: max-content;
        background-attachment: fixed;
        background-position: center;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */


    }

</style>
