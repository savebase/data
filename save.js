const fileUploader = document.getElementById('file-uploader');
const reader = new FileReader();
const imageGrid = document.getElementById('image-grid');

fileUploader.addEventListener('change', (event) => {
  const files = event.target.files;
  const file = files[0];
  reader.readAsDataURL(file);
  
  reader.addEventListener('load', (event) => {
    const img = document.createElement('img');
    imageGrid.appendChild(img);
    img.src = event.target.result;
    img.alt = file.name;
  });
});
