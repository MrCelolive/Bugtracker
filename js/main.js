const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#form-password");

togglePassword.addEventListener("click", function () {
   
  const type = password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  
  this.classList.toggle('fa-eye');
  this.classList.toggle('fa-eye-slash');
});

function somaCarrinho(id_quantidade, id_preco){
  var quant = document.getElementById(id_quantidade).value
  console.log(quant)
  var preco = document.getElementById(id_preco).value / quant
  quant++;
  document.getElementById(id_quantidade).value=quant;
  document.getElementById(id_preco).value=quant*preco;
}

function subtraiCarrinho(id_quantidade, id_preco){
  var quant = document.getElementById(id_quantidade).value
  var preco = document.getElementById(id_preco).value / quant
  quant--;
  if(quant>0){
    document.getElementById(id_quantidade).value=quant;
    document.getElementById(id_preco).value=quant*preco;
  }
}

function darkmode(){
  if(document.body.style.backgroundColor == 'black')
    document.body.style.backgroundColor = 'white'
  else
    document.body.style.backgroundColor = 'black'
}