
  var error = null;

  function validate_password(password)
  {

      if(password.length < 8)
      {
        error = "<div class='text-danger'>password should be at least 8 character</div>";
        return false;
      }else
      {

        if( !(/[0-9]/g.test(password)))
        {
            error = "<div class='text-danger'>Password should contain at least 2 digits (0 - 9)</div>";
            return false;
        }else if( !(/[a-z]/g.test(password)))
        {
            error = "<div class='text-danger'>Password should contain at least 2 lowercase letters (a - z)</div>";
            return false;
        }else if( !(/[A-Z]/g.test(password)))
        {
            error = "<div class='text-danger'>Password should contain at least 2 Uppercase letters (A - Z)</div>";
            return false;
        }else if( !(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g.test(password)))
        {
            error = "<div class='text-danger'>Password should contain at least 2 characters eg: & # $</div>";
            return false;
        }else
        {
            error = null;
            return true;
        }

      }



  }

  function validate_number(number)
  {
    var no# = number.trim();
    if(!no#.NaN)
    {
      error = "";
      return true;
    }else
    {
      error = "<div class='text-danger'>This field only accept numbers! (0 - 9)</div>";
      return false;
    }
  }

  function validate_email(email)
  {
    var mail = email.trim();

    if(mail.length >= 5)
    {
      var email_test = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(email_test.test(String(mail).toLowerCase()))
      {
        error = "";
        return true;
      }else
      {
        error = "<div class='text-danger'>email address is like: example@organisation.com</div>";
        return false;
      }

    }else
    {
        error = "<div class='text-danger'>Email address should be at least 5 digits long</div>";
        return false;

    }
  }

  function validate_idnumber(idnumber)
  {
    var id_no = idnumber.trim();

    var txt1 = id_no.slice(2,4);
    var txt2 = id_no.slice(4,6);

    var num1 = parseInt(txt1);
    var num2 = parseInt(txt2);

    if(id_no.length == 13)
    {
      if(!(/\d/g.test(id_no)))
      {
          return false;
          error = "<div class='text-danger'>Id number should only consist of digits</div>";
      }else
      {
        if(!(num1 > 0 && num1 <= 12))
        {
          return false
        	error = "Incorrect month in your id number";
        }else if(!(num2 > 0 && num1 <= 31))
        {
        	error = "Incorrect month in your id number";
          return false;
        }else
        {
          error = "";
          return true;
        }
      }
    }else
    {
          error = "<div class='text-danger'>Id number should be 13 digits</div>";
          return false;
    }
  }


  function validate_name(name)
  {
    var person_name = name.trim();

    if(person_name.length < 3)
    {
      error = "<div class='text-danger'>Your name should be at least 3 characters</div>";
      return false;
        // var txt1 = (name.slice(0,1)).toUpperCase();
        // var txt2 = (name.slice(1,str.length)).toLowerCase();

    }else if(/\d/i.test(person_name))
    {
       error = "<div class='text-danger'>Your name can\'t have a number</div>";
       return false;
    }else
    {
      error = "";
      return true;
    }
  }

  function validate_cellno(cell_no)
  {
    var c_no = cell_no.trim();

    if( !(/[0-9]/g).test(c_no) )
    {
      error = "<div class='text-danger'>Number should only contain numbers from (0 - 9)</div>";
      return false;
    }else
    {
      var txt1 = c_no.slice(0,1);
      var num1 = parseInt(txt1);
      var checkd = /[0]/.test(num1);

      if(!checkd)
      {
        error = "<div class='text-danger'>number has to start with zero (0)</div>";
        return false;
      }
      if(!(c_no.length == 10))
      {
         error = "<div class='text-danger'>number should be at 10 digits</div>";
         return false;
      }else
      {
          error = "";
          return true;
      }

    }



  }

  function validate_select(select_option)
  {
    return false;
    // if(select_option != "")
    // {
    //   error = "";
    //   return true;
    // }else
    // {
    //   error = "Please select an item";
    //   return false;
    // }
  }

  function print_error(id)
  {
    $('#'+id).html(error);
  }
