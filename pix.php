<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagamento via PIX</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  box-sizing: border-box;
  text-align: center;
}


h1 {
  font-size: 48px;
  font-weight: bold;
  color: #333;
  margin-bottom: 30px;
}

p {
  font-size: 24px;
  color: #666;
  margin-bottom: 20px;
}

.pix-info {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.pix-info p {
  font-size: 18px;
  margin-bottom: 10px;
}

.tutorial h1 {
 color: red
}

.pix-code {
  font-size: 44px;
  font-weight: bold;
  margin-bottom: 20px;
}

.pix-qrcode {
  max-width: 200px;
  margin: 0 auto;
  display: block;
  margin-bottom: 20px;
}

#valorParaPagar {
  color: #000000;
  font-size: 19px;
  font-weight: bold;
  font-family: Arial, Helvetica, sans-serif;
  margin: 5px 0;
  
}
/* Estilos para o título */
#title {
  font-size: 19px;
  font-weight: bold;
  margin: 24px 0;
  color: rgb(255, 0, 0);
  display: inline-block;
  font-family: Arial, Helvetica, sans-serif;
}

/* Estilos para o nome do produto */
#nome-produto {
  font-family: 'Montserrat', sans-serif;
  font-weight: 500;
  font-size: 19px;
  display: inline-block;
  margin: 5px 0;
  color: rgb(83, 77, 77);

  transition: all 0.2s ease-in-out;
}

#nome-produto:hover {
  color: rgb(255, 0, 0);
  border-bottom-color: rgb(255, 0, 0);
}



#ja-paguei {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 24px;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

#ja-paguei:hover {
  background-color: #3E8E41;
}

#ja-paguei2 {
  background-color: #ff5d5d;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 24px;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

#ja-paguei2:hover {
  background-color: #ff2727;
}

.error-message {
  color: #FF0000;
  font-weight: bold;
  margin-top: 20px;
}

@media (max-width: 768px) {
  .container {
    padding: 10px;
  }

  h1 {
    font-size: 36px;
  }

  p {
    font-size: 18px;
    margin-bottom: 10px;
  }

  .pix-info {
    padding: 10px;
  }

  .pix-code {
    font-size: 24px;
    margin-bottom: 10px;
  }

  #pagar-cartao {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 24px;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

#pagar-cartao:hover {
  background-color: #0056b3;
}


  .pix-qrcode {
    max-width: 150px;
    margin-bottom: 10px;
  }

  #ja-paguei {
    font-size: 20px;
    padding: 8px 16px;
  }

  #ja-paguei2 {
    font-size: 20px;
    padding: 8px 16px;
  }
}
  </style>
</head>
<body>
  <div class="container">
    <h1>Pagamento via PIX</h1>
  <!--  
    <h1 id="title">Seus produtos: </h1>
 -->
    <p id="nome-produto"></p>
    <p>Faça um pix de R$<span id="valorParaPagar"></span> para a chave abaixo!</p>
    <div class="pix-info">
      <p>Chave PIX:</p>
      <p class="pix-code">biachxs@gmail.com</p>
      <img src="images/code.jpg" alt="QR Code do PIX" class="pix-qrcode">
      <button id="ja-paguei">JA PAGUEI</button>
      <!--    <button id="ja-paguei2">Pagar com cartão</button>  -->
    </div>


    <div class="tutorial">
      <h1>Tutorial:</h1>
      <p>Para realizar o pagamento, siga os passos abaixo:</p>
      <ol>
         <li>Copie a chave PIX acima.</li>
         <li>Abra o aplicativo do seu banco.</li>
         <li>Selecione a opção de pagamento via PIX.</li>
         <li>Cole a chave PIX que você copiou no primeiro passo.</li>
         <li>Insira o valor de <span id="valorParaPagar2"></span> reais a ser pago.</li>
         <li>Confirme os dados do pagamento e autorize a transação.</li>
         <li>Depois de realizar o pagamento, clique no botão "JA PAGUEI".</li>
         <li>Por fim, envie o comprovante de pagamento para a bia.</li>
      </ol>
</div>
  <script>
 const jaPagueiButton = document.querySelector("#ja-paguei");
    const valorParaPagar = localStorage.getItem("desconto");
    const NomeProduto = localStorage.getItem("produto");
    console.log(valorParaPagar)
    document.querySelector("#nome-produto").innerText = NomeProduto;
    document.querySelector("#valorParaPagar").innerText = valorParaPagar;
    document.querySelector("#valorParaPagar2").innerText = valorParaPagar;
    jaPagueiButton.addEventListener("click", function() {
      window.location.href = `https://api.whatsapp.com/send/?phone=5522998627793&text=oii+gata%2C+comprei+o+pack+"${NomeProduto}"+de+${valorParaPagar}+reais%2C+%2Avou+te+enviar+o+comprovante%3A%2A&type=phone_number&app_absent=0`;
    });
    
    const pagarCartaoButton = document.querySelector("#ja-paguei2");
pagarCartaoButton.addEventListener("click", function() {
  const valorParaPagar = localStorage.getItem("desconto");
    const NomeProduto = localStorage.getItem("produto");
  const url = "Pagamento/index.php" +
    "?NomePRODUTO=" + encodeURIComponent(NomeProduto) +
    "&PRECOPRODUTO=" + encodeURIComponent(valorParaPagar) 


  window.location.href = url;
});

        </script>
</body>
</html>
