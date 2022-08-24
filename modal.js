const btns = document.querySelectorAll(".btn5"); 
const modal = document.getElementById('modal');
const close = document.getElementById('close_btn');
const submit = document.querySelector(".submit"); 


btns.forEach(btn5 => {
   btn5.addEventListener('click', function() {
      modal.classList.add('modal_opened')        
   })
})

close.addEventListener('click', function() {
   modal.classList.remove('modal_opened') 
})

submit.addEventListener('click', async evt => {

   evt.preventDefault()   

   const formData = new formData()
   formData.append('name', document.querySelector('#name').value)
   formData.append('phone', document.querySelector('#phone').value)


   let result = await responce.json();
   console.log(result.res)
   if(result.res == 'falid'){
      document.querySelector('modal_content h2');
      h2.textContant = 'Попробуйте еще раз'
}
})

