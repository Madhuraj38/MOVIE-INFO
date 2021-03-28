//var searchText;
function mov(){
    document.getElementById('mov').style.display="block";
    document.getElementById('act').style.display="none";
    document.getElementById('dir').style.display="none";
    
    
}

function act(){
    document.getElementById('mov').style.display="none";
    document.getElementById('act').style.display="block";
    document.getElementById('dir').style.display="none";
    
}

function direct(){
    document.getElementById('mov').style.display="none";
    document.getElementById('act').style.display="none";
    document.getElementById('dir').style.display="block";
    
}
/*$(document).ready(() => {
    $('#searchForm').on('submit', (e) => {
      let searchText = $('#searchText').val();
      stats(searchText);
      e.preventDefault();
    });
  });
console.log(searchText);
function fun(){
    let s=document.getElementById('searchText').value();
    console.log(s);
}*/