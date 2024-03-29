<?php defined('BASE_URL') OR exit('No direct script access allowed'); ?> 
 
 <!-- Navigation -->
 <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top <?= $page == 'home' ? 'home' : '' ?>">
  <div class="container">
    <a class="navbar-brand" href="/"><?= APP_NAME ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#top">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#product">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#testimoni">Testimoni</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>