@extends('layouts.app')

  <style>
    /* Styles for dialog window */
    #small-dialog {
      background: white;
      padding: 5px;
      max-width: 750px;
      margin: 40px auto;
      position: relative;
    }

    div#small-dialog iframe {
      width: 100%;
      height: 400px;
      display: block;
    }


    /**
 * Fade-zoom animation for first dialog
 */

    /* start state */
    .my-mfp-zoom-in .zoom-anim-dialog {
      opacity: 0;

      -webkit-transition: all 0.2s ease-in-out;
      -moz-transition: all 0.2s ease-in-out;
      -o-transition: all 0.2s ease-in-out;
      transition: all 0.2s ease-in-out;



      -webkit-transform: scale(0.8);
      -moz-transform: scale(0.8);
      -ms-transform: scale(0.8);
      -o-transform: scale(0.8);
      transform: scale(0.8);
    }

    /* animate in */
    .my-mfp-zoom-in.mfp-ready .zoom-anim-dialog {
      opacity: 1;

      -webkit-transform: scale(1);
      -moz-transform: scale(1);
      -ms-transform: scale(1);
      -o-transform: scale(1);
      transform: scale(1);
    }

    /* animate out */
    .my-mfp-zoom-in.mfp-removing .zoom-anim-dialog {
      -webkit-transform: scale(0.8);
      -moz-transform: scale(0.8);
      -ms-transform: scale(0.8);
      -o-transform: scale(0.8);
      transform: scale(0.8);

      opacity: 0;
    }

    /* Dark overlay, start state */
    .my-mfp-zoom-in.mfp-bg {
      opacity: 0;
      -webkit-transition: opacity 0.3s ease-out;
      -moz-transition: opacity 0.3s ease-out;
      -o-transition: opacity 0.3s ease-out;
      transition: opacity 0.3s ease-out;
    }

    /* animate in */
    .my-mfp-zoom-in.mfp-ready.mfp-bg {
      opacity: 0.8;
    }

    /* animate out */
    .my-mfp-zoom-in.mfp-removing.mfp-bg {
      opacity: 0;
    }



    /**
 * Fade-move animation for second dialog
 */

    /* at start */
    .my-mfp-slide-bottom .zoom-anim-dialog {
      opacity: 0;
      -webkit-transition: all 0.2s ease-out;
      -moz-transition: all 0.2s ease-out;
      -o-transition: all 0.2s ease-out;
      transition: all 0.2s ease-out;

      -webkit-transform: translateY(-20px) perspective(600px) rotateX(10deg);
      -moz-transform: translateY(-20px) perspective(600px) rotateX(10deg);
      -ms-transform: translateY(-20px) perspective(600px) rotateX(10deg);
      -o-transform: translateY(-20px) perspective(600px) rotateX(10deg);
      transform: translateY(-20px) perspective(600px) rotateX(10deg);

    }

    /* animate in */
    .my-mfp-slide-bottom.mfp-ready .zoom-anim-dialog {
      opacity: 1;
      -webkit-transform: translateY(0) perspective(600px) rotateX(0);
      -moz-transform: translateY(0) perspective(600px) rotateX(0);
      -ms-transform: translateY(0) perspective(600px) rotateX(0);
      -o-transform: translateY(0) perspective(600px) rotateX(0);
      transform: translateY(0) perspective(600px) rotateX(0);
    }

    /* animate out */
    .my-mfp-slide-bottom.mfp-removing .zoom-anim-dialog {
      opacity: 0;

      -webkit-transform: translateY(-10px) perspective(600px) rotateX(10deg);
      -moz-transform: translateY(-10px) perspective(600px) rotateX(10deg);
      -ms-transform: translateY(-10px) perspective(600px) rotateX(10deg);
      -o-transform: translateY(-10px) perspective(600px) rotateX(10deg);
      transform: translateY(-10px) perspective(600px) rotateX(10deg);
    }

    /* Dark overlay, start state */
    .my-mfp-slide-bottom.mfp-bg {
      opacity: 0;

      -webkit-transition: opacity 0.3s ease-out;
      -moz-transition: opacity 0.3s ease-out;
      -o-transition: opacity 0.3s ease-out;
      transition: opacity 0.3s ease-out;
    }

    /* animate in */
    .my-mfp-slide-bottom.mfp-ready.mfp-bg {
      opacity: 0.8;
    }

    /* animate out */
    .my-mfp-slide-bottom.mfp-removing.mfp-bg {
      opacity: 0;
    }
  </style>
@section('content')
  <section class="w3l-about1">
    <div class="new-block top-bottom">
      <div class="container">
        <div class="middle-section">
          <!-- <h5>Tagline</h5> -->
          <div class="section-width">
            <h2>About Smart Wallet</h2>
          </div>
          <div class="link-list-menu">
            <p>Smart Wallet is school project designed and created by Jesse for farmers
                to easily be able to make transactions with their banks with the help of
                Unstructured Supplementary Service Data (USSD). 
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>




  <section class="w3l-about2">
    <div class="features-main py-5">
      <div class="container py-lg-3">
        <h3 class="stat-title">Technology Used in Designing this Project</h3>
        <div class="row features">
          <div class="col-md-4 feature-1 mt-5">
            <div class="feature-body">
              <div class="feature-images">
                <span>
                    <img src="{{ asset('assets/images/laravel.png') }}" width="100px">
                </span>
              </div>
              <div class="feature-info mt-4">
                <h3 class="feature-titel my-2">Laravel (PHP Framework)</h3>
                <p class="feature-text">Laravel is an open-source PHP framework, which is robust
                    and easy to understand. it follows a model-view-controller design pattern.
                    Laravel reuses the existing components of different frameworks which helps in creating a 
                    web application
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 feature-2 mt-5">
            <div class="feature-body">
              <div class="feature-images">
                <span>
                    <img src="{{ asset('assets/images/vue.png') }}" width="100px">
                </span>
              </div>
              <div class="feature-info mt-4">
                <h3 class="feature-titel my-2">Vue</h3>
                <p class="feature-text">
                    Vue.js us an open-source model-view-viewmodel Javascript framework for
                    building user interfaces. The goal of Vue.js is to provide the
                    benefits of reactive data binding and composable view components with an API
                    that is as simple as possible.    
                </p>

              </div>
            </div>
          </div>
          <div class="col-md-4 feature-3 mt-5">
            <div class="feature-body">
              <div class="feature-images">
                <span>
                    <img src="{{ asset('assets/images/vuetify.png') }}" width="100px">
                </span>
              </div>
              <div class="feature-info mt-4">
                <h3 class="feature-titel my-2">Vuetify</h3>
                <p class="feature-text">
                Vuetify.js is a reusable sematic component framework for Vue.js that aims to provide clean,
                semantic and reusable components. It supports all the modern browsers and is compatible
                with Vue.js CLI-3. It also offers basic templates for Simple HTML.

                    
                 </p>
                <div class="hover">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
