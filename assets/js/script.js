var check = function() {
    
    var p1 = document.getElementById('Password');
    var p2 = document.getElementById('RePassword');
    var m1 = document.getElementById('message1');
    var m2 = document.getElementById('message2');
    if (p1.value == p2.value) {
      p1.classList.remove("is-invalid");
      p1.classList.add("is-valid");
      p2.classList.remove("is-invalid");
      p2.classList.add("is-valid");
      m1.innerHTML = 'match!';
      m2.innerHTML = 'match!';
    } else {
      m1.innerHTML = 'not match!';
      m2.innerHTML = 'not match!';
      p1.classList.add("is-invalid");
      p2.classList.add("is-invalid");
    }

    if(p1.value == "" || p2.value == "" || p1 == "undefined" || p2 == "undefined"){
        p1.classList.remove("is-invalid");
        p2.classList.remove("is-invalid");
        p1.classList.remove("is-valid");
        p2.classList.remove("is-valid");
    }
  }

  function previewImg(){
    const gambar = document.querySelector('#gambar');
    const  imgPreview =  document.querySelector('.img-preview');
    
    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);
    
    fileGambar.onload = function(e){
        imgPreview.src = e.target.result;
    }
}


