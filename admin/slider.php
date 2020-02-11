<!-- start: MAIN CONTAINER -->
<div class="main-container">
  <div class="navbar-content">
    <!-- start: SIDEBAR -->
    <div class="main-navigation navbar-collapse collapse">
      <!-- start: MAIN MENU TOGGLER BUTTON -->
      <div class="navigation-toggler">
        <i class="clip-chevron-left"></i>
        <i class="clip-chevron-right"></i>
      </div>
      <!-- end: MAIN MENU TOGGLER BUTTON -->
      <!-- start: MAIN NAVIGATION MENU -->
      <ul class="main-navigation-menu">
        <li>
          <a href="index-2.html"><i class="clip-home-3"></i>
            <span class="title">HOME </span><span class="selected"></span>
          </a>
        </li>
        





        <li <?php if (isset($cclass)) echo $cclass; ?> >
          <a href="javascript:void(0)"><i class="clip-file"></i>
            <span class="title"> Category  </span><i class="icon-arrow"></i>
            <span class="selected"></span>
          </a>
          <ul class="sub-menu">
            <li <?php if(isset($csubclass)) echo $csubclass; ?>>
              <a href="Category.php">
                <span class="title"> Add Category  </span>

              </a>
            </li>
            <li <?php if(isset($vsubclass)) echo $vsubclass; ?>>
              <a href="ViewCategory.php">
                <span class="title"> View Category  </span>

              </a>
            </li>

          </ul>
        </li>

      



   <li <?php if (isset($csclass)) echo $csclass; ?> >
          <a href="javascript:void(0)"><i class="clip-file"></i>
            <span class="title"> Sub Category  </span><i class="icon-arrow"></i>
            <span class="selected"></span>
          </a>
          <ul class="sub-menu">
            <li <?php if(isset($cssubclass)) echo $cssubclass; ?>>
              <a href="SubCategory.php">
                <span class="title"> Add Sub Category  </span>

              </a>
            </li>
            <li <?php if(isset($vcsubclass)) echo $vcsubclass; ?>>
              <a href="ViewSubCategory.php">
                <span class="title"> View Sub Category  </span>

              </a>
            </li>

          </ul>
        </li>









      <!-- class="active open" class="active"-->

      </ul>
      <!-- end: MAIN NAVIGATION MENU -->
    </div>
    <!-- end: SIDEBAR -->
  </div>
