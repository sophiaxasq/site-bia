let num = 23;
if (num % 1 === 0) {  // verifica se o número não tem casas decimais
  num = num.toFixed(2).replace('.', '.00');  // adiciona ".00" ao final
}
console.log(num);  // imprime "23.00"
