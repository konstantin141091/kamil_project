let inputs = document.querySelectorAll('.placeholder');
inputs.forEach((el) => {
  if (el.value != '') {
    el.classList.add('has-value');
  }
});



// var dateClass='.datechk';
// $(document).ready(function ()
// {
//   if (document.querySelector(dateClass).type !== 'date')
//   {
//     var oCSS = document.createElement('link');
//     oCSS.type='text/css'; oCSS.rel='stylesheet';
//     oCSS.href='//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css';
//     oCSS.onload=function()
//     {
//       var oJS = document.createElement('script');
//       oJS.type='text/javascript';
//       oJS.src='//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js';
//       oJS.onload=function()
//       {
//         $(dateClass).datepicker();
//       };
//       document.body.appendChild(oJS);
//     };
//     document.body.appendChild(oCSS);
//   }
// });
