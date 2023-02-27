// activating tooltip
const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);
var toolbarOptions = [
  ["bold", "italic", "underline", "strike"], // toggled buttons
  ["blockquote", "code-block"],
  [{ header: 1 }, { header: 2 }], // custom button values
  [{ list: "ordered" }, { list: "bullet" }],
  [{ script: "sub" }, { script: "super" }], // superscript/subscript
  [{ indent: "-1" }, { indent: "+1" }], // outdent/indent
  [{ direction: "rtl" }],
  [{ header: [1, 2, 3, 4, 5, 6, false] }],
  ["link", "formula"],
  [{ color: [] }, { background: [] }], // dropdown with defaults from theme
  [{ font: [] }],
  [{ align: [] }],

  ["clean"], // remove formatting button
];
var quill = new Quill("#editor", {
  theme: "snow",
  modules: {
    toolbar: toolbarOptions,
  },
});

let form = document.getElementById("serviceForm");
form.onsubmit = function (e) {
  console.log(quill.getContents());
  const content = quill.getContents();
  let showcase = document.getElementById("showcase");
  let service_content = document.querySelector("#service_content");
  service_content.value = JSON.stringify(quill.root.innerHTML);
  return true;
};

function goback(){
    window.history.back();
}
function sweetAlert(){
    Swal.fire({
    title: 'Successfully Registered!',
    text: 'Do you want to go to the Log In page?',
    icon: 'success',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, send me there!'
 }).then(function(result) {
   if (result.isConfirmed) {
     location.assign("https://stackoverflow.com/")
   }
 });
}
function Popup(icon,title,msg){
    new swal({icon:icon,title:title,text:msg,timer: 1500});
}