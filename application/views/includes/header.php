<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Social Network for Clubs and Socs - 'Oh, so they have Internet on computers now!'</title>


<link rel="stylesheet" href= "<?php echo base_url(); ?>css/reset.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/text.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font.css" type="text/css" charset="utf-8">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/960_24_col.css" />
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>system/application/css/demo.css" />-->


<link rel="stylesheet/less" href="<?php echo base_url(); ?>css/style.less" /> 
<script src="http://lesscss.googlecode.com/files/less-1.0.18.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script src="<?php echo base_url(); ?>js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<script language="javascript" src="<?php echo base_url(); ?>js/ajax_post.js"></script>

<script> 
  var movieList = new Array();
  var movieListSorted = new Array();
  var friendCount = 0;
  function showMovies() {
    alert(movieList.length);
  }
  function compareMovies(movieA, movieB) {
    if (movieA.name === movieB.name) return 0;
    if (movieA.name > movieB.name) return 1;
    return -1;
  }
  function popularMovies(movieA, movieB) {
    return movieB.mCount - movieA.mCount;
  }
  function data_fetch_postproc() {
    document.getElementById('test').innerHTML 
      = "Generating recommendations ... ";
    movieList.sort(compareMovies);
    // Now we have sorted list, dedupe and count
    mCtr = 0;
    for (i = 0; i < movieList.length; i++)
    {
      var count = 0;
      movieListSorted[mCtr] = movieList[i];
      for ( j = i; j < movieList.length; j++)
      {
        if ( movieList[i].name === movieList[j].name ) {
          count++;
        } else {
			  break;
        }
      }
      i = i+count-1;
      movieListSorted[mCtr++].mCount = count;
    }
    var maxResults = 100;
    if( movieListSorted.length < 100) {
      maxResults = movieListSorted.length;
    } 
    movieListSorted.sort(popularMovies);
    document.getElementById('test').innerHTML = "";
    for( i=0; i<maxResults; i++) {
      var newDiv = document.createElement("DIV");
      newDiv.id = movieListSorted[i].id;
      newDiv.innerHTML = movieListSorted[i].name + ' : Likes - ' 
        + movieListSorted[i].mCount;
      document.getElementById("movies").appendChild(newDiv);
      FB.api('/'+movieListSorted[i].id, function(response) {
        var newDiv = document.createElement("DIV");
        newDiv.innerHTML = "<img src='"+response.picture+"'>"
          + "</img><br/>";
        if( response.link) {
          newDiv.innerHTML+= "<a href='"+response.link+"'>"
            +response.link+"</a><br/>";
          newDiv.innerHTML+= '<iframe src='
            + '"http://www.facebook.com/plugins/like.php?'
            + 'href='+response.link+'&amp;layout=standard'
            + '&amp;show_faces=true&amp;'
            + 'width=450&amp;action=like&amp;'
            + 'colorscheme=light&amp;height=80"' 
            + 'scrolling="no" frameborder="0" style="'
            + 'border:none; overflow:hidden;' 
            + 'width:450px; height:80px;"'
            + 'allowTransparency="true"></iframe><br/>';
        }
        document.getElementById(response.id).appendChild(newDiv);
      });
    }
  }
  function get_friend_likes() {
    document.getElementById('test').innerHTML = "Requesting "
      + "data from Facebook ... ";
    FB.api('/me/friends', function(response) {
        friendCount = response.data.length;
        for( i=0; i<response.data.length; i++) {
          friendId = response.data[i].id;
          FB.api('/'+friendId+'/interests', function(response) {
            movieList = movieList.concat(response.data);
            friendCount--;
            document.getElementById('test').innerHTML = friendCount 
              + " friends to go ... ";
            if(friendCount === 0) { data_fetch_postproc(); };
          });
        } 
      });
  }
</script>

</head>
<body>
	<div id="top_banner"> 
			<div class="container_24">
				<div class="grid_3">
				<h1>
					Coterie
				</h1>
				</div>
				<div id="banner_right" class="grid_10"><?php echo anchor('', 'Home', 'title="Home"'); ?> &nbsp;&nbsp; <?php echo anchor('/club/browse', 'Browse', 'title="Browse"'); ?> &nbsp;&nbsp; <?php if($this->session->userdata('is_logged_in') == 'true'){ echo anchor('club/profile/'.$this->session->userdata('id'), 'My Club', 'title="My Club"');} ?> </div>
				<div id="banner_right_float" class="grid_9">
					<?php if($this->session->userdata('is_logged_in') != 'true'){?>
					 <fb:login-button autologoutlink="true" perms="user_likes,friends_likes, email,user_checkins,user_activities,user_interests, friends_interests"></fb:login-button> | 
					<a href="<?php echo base_url(); ?>index.php/login">Club Login</a>
					<?php }else{ ?>
					 <fb:login-button autologoutlink="true" perms="user_likes,friends_likes, email,user_checkins,user_activities,user_interests, friends_interests"></fb:login-button> | 
					<span>Welcome <?php echo $this->session->userdata('full_name'); ?>: </span>
					<a href="<?php echo base_url(); ?>account/edit/<?php echo $this->session->userdata('id'); ?>">Account</a>
					 | <a href="<?php echo base_url(); ?>index.php/logout">Logout</a>
					<?php } ?>
				</div>
			</div>
	</div>
	<!-- End top_banner -->
<div id="main_container" class="container_24">