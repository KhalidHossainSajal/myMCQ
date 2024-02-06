<template>
    
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4">Main Menu</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto bg-dark">
          <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
              Home
            </a>
          </li>
          <li>
            <a href="#" id="create_mcq" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              Create MCQ
            </a>
          </li>
         
          <ul class="list-group bg-dark" id="mcq_dropdown">
            <li class="list-group-item nav-item bg-dark borderless"><a href="create_subject" class=" bg-dark nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              Subjects
            </a></li>
            <li class="list-group-item nav-item bg-dark borderless"><a href="create_chapter" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              Chapters
            </a></li>
            <li class="list-group-item nav-item bg-dark borderless"><a href="create_mcq" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              MCQ
            </a></li>
            <li class="list-group-item nav-item bg-dark borderless"><a href="#" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              Manage Users
            </a></li>
            <li class="list-group-item nav-item bg-dark borderless"><a href="#" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              Manage Users
            </a></li>
          </ul>
          <li>
            <a href="create_short_question" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
              Short Questions
            </a>
          </li>
          
          <li>
            <a href="create_msg" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Contact Us
            </a>
          </li>
        </ul>
        <hr>
     
      </div>
    
</template>