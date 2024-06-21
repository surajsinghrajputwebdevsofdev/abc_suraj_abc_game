@include('layouts.app')


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../cssfolder/createround.css">

    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
        <form action="{{ route('round') }}" method="POST" enctype="multipart/form-data">
            @csrf
                    <h1> Create Round </h1>
        
          
          <legend><span class="number">1</span> Your Basic Info</legend>
      

          <label for="a">Select Round</label>
          <select id="selectround" name="selectround">
          
              <option value="frontend_developer">Front-End Developer</option>
              <option value="php_developer">PHP Developer</option>
              <option value="python_developer">Python Developer</option>
              <option value="rails_developer">Rails Developer</option>
              <option value="web_designer">Web Designer</option>
              <option value="wordpress_developer">Wordpress Developer</option>
          
          </select>

          <label for="b">Select Sub Round</label>
          <select id="selectsubround" name="selectsubround">
          
              <option value="WA 1440 (90m)">WA 1440 (90m)</option>
              <option value="php_developer">PHP Developer</option>
              <option value="python_developer">Python Developer</option>
              <option value="rails_developer">Rails Developer</option>
              <option value="web_designer">Web Designer</option>
              <option value="wordpress_developer">Wordpress Developer</option>
          
          </select>

          <label for="c">Select Bow</label>
          <select id="selectbow" name="selectbow">
          
              <option value="frontend_developer">Front-End Developer</option>
              <option value="php_developer">PHP Developer</option>
              <option value="python_developer">Python Developer</option>
              <option value="rails_developer">Rails Developer</option>
              <option value="web_designer">Web Designer</option>
              <option value="wordpress_developer">Wordpress Developer</option>
          
          </select>


          <label for="d">Select Arrow</label>
          <select id="selectarrow" name="selectarrow">
          
              <option value="frontend_developer">Front-End Developer</option>
              <option value="php_developer">PHP Developer</option>
              <option value="python_developer">Python Developer</option>
              <option value="rails_developer">Rails Developer</option>
              <option value="web_designer">Web Designer</option>
              <option value="wordpress_developer">Wordpress Developer</option>
          
          </select>


          <label for="e">Select Location</label>
          <select id="selectlocation" name="selectlocation">
          
              <option value="frontend_developer">Front-End Developer</option>
              <option value="php_developer">PHP Developer</option>
              <option value="python_developer">Python Developer</option>
              <option value="rails_developer">Rails Developer</option>
              <option value="web_designer">Web Designer</option>
              <option value="wordpress_developer">Wordpress Developer</option>
          
          </select>

          <label for="job">Select Session Type</label>

          <div class="row">
            <button1 type="button" class="btn_choose_sent bg_btn_chose_1">
                <input type="radio" name="selectsessiontype" id="selectsessiontype" value="Practice" checked />Practice
            </button1>
            <button1 type="button" class="btn_choose_sent bg_btn_chose_2">
                <input type="radio" name="selectsessiontype" id="selectsessiontype" value="Competition"/>Competition
            </button1>
          </div>
        
    


          <label style="margin-top: 3%" for="jobs">Select Input Method</label>

          <div class="row">
            <button1 type="button" class="btn1_choose_sent bg_btn_chose_1">
                <input type="radio" name="selectinputmethod" id="selectinputmethod" value="Arrow_values" checked />Arrow Values
            </button1>
            <button1 type="button" class="btn1_choose_sent bg_btn_chose_2">
                <input type="radio" name="selectinputmethod" id="selectinputmethod" value="Target_face" />Target Face
            </button1>
          </div>


        <button type="submit">Submit</button>
        
       </form>
        </div>
      </div>
      
    </body>
</html>











