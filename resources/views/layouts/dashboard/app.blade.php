<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    @notifyCss
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}"
    >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    @yield('third_party_stylesheets')

    @stack('page_css')


    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>
</head>
<style type="text/css" media="screen">
  .notify-success {
    z-index: 100000;
  }
  .breadcrumb {
    background: none;
  }
</style>

<body class="c-app c-legacy-theme">

@include('layouts.dashboard.include._sidebar')  

@include('layouts.dashboard.include.partials._session')

<div class="c-wrapper">
    <header class="c-header c-header-light c-header-fixed">
        @include('layouts.dashboard.include._header')

            @yield('content')
        </main>
    </div>

    <footer class="c-footer">
      </footer>

</div>

{{--noty--}}

<script src="{{ mix('js/app.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>

{{--ckeditor standard--}}
<script src="{{ asset('dashboard_files/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('dashboard_files/jquery.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@yield('third_party_scripts')

@stack('page_scripts')
</script>


@include('notify::messages')
<x:notify-messages />
@notifyJs
<script src="{{ asset('dashboard_files/noty.js') }}" defer></script>
    <script type="text/javascript">

function printColor(ev) {
  const color = ev.target.value
  const r = parseInt(color.substr(1,2), 16)
  const g = parseInt(color.substr(3,2), 16)
  const b = parseInt(color.substr(5,2), 16)
  const a = parseInt(color.substr(6,2), 16)
  
  var col = (`${r},${g},${b},${a}`);

  var test = $('#ali').css('colo', 'red');


  console.log(test);

}

    </script>
    <script>
      
      $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
        var src = $(this).attr('src');
        var modal;

        function removeModal() {
          modal.remove();
          $('body').off('keyup.modal-close');
        }
        modal = $('<div>').css({
          background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
          backgroundSize: 'contain',
          width: '100%',
          height: '100%',
          position: 'fixed',
          zIndex: '10000',
          top: '0',
          left: '0',
          cursor: 'zoom-out'
        }).click(function() {
          removeModal();
        }).appendTo('body');
        //handling ESC
        $('body').on('keyup.modal-close', function(e) {
          if (e.key === 'Escape') {
            removeModal();
          }
        });
      });
    </script>

</body>
</html>
