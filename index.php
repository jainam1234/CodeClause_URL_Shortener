<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>URL SHORTENER - TRIM Your Urls</title>
  <style>
    .custom-bg {
      background-color: #2ECC71;
    }

    .btn-custom {
      background-color: #2ECC71;
      color: white;
    }

    .btn-custom:hover {
      opacity: 0.8;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-dark custom-bg shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <class="d-inline-block align-text-top">
        URL SHORTENER
      </a>
    </div>
  </nav>
  <div class="container">
    <div class="col-8 m-auto d-flex justify-content-center align-items-center flex-column" style="height: 500px;">
      <div class="alert" role="alert"></div>
      <div class="input-group my-3">
        <input type="text" id="longurl" class="form-control" placeholder="Paste your long url..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-custom" type="button" id="ls-button">Short Url</button>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script>

  	$(function() {
  		$('.alert').html('').hide();
  	});

    $(document).on('click', '#ls-button', function(event) {
      event.preventDefault();
      $.ajax({
      	url: 'process.php',
      	type: 'POST',
      	dataType: 'json',
      	data: {longurl: $('#longurl').val()},
      })
      .done(function(res) {
      	if (res.status == true) {
      		$('.alert').html('').show().removeClass('alert-warning').addClass('alert-success').append(
      			`<h5>Link is shorted successfully</h5>
      			<a href="${res.longurl}">http://linkshort/${res.shorted}</a>`
      		);
      		$('#longurl').val('');
      	} else {
      		$('.alert').html('').show().removeClass('alert-success').addClass('alert-warning').append(`<h5>${res.msg}</h5>`);
      	}
      });
    });
  </script>

</body>

</html>