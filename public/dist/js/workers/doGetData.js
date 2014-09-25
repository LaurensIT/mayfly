importScripts('/dist/js/rng.js','/dist/js/prng4.js','/dist/js/jsbn.js','/dist/js/jsbn2.js','/dist/js/rsa.js','/dist/js/rsa2.js');
$.ajax({
  url: "/onetime/createNewSession"
}).done(function(data) {
 alert(data);
});
