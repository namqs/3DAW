//Funções da funcioalidade de incluir
function enviarForm1() 
{   
    let nome = document.getElementById("nome").value;
    let cpf = document.getElementById("cpf").value;
    let sala = document.getElementById("sala").value;
    let xmlHttp = new XMLHttpRequest();
  
    xmlHttp.open("GET", "http://localhost/3DAW/AV2/Incluir.php?nome=" + nome +
        "&cpf=" + cpf + "&sala=" + sala);
    xmlHttp.send();
  
    location.reload();
  }
  
  //Funções da funcionalidade de listar
  function carregaCandidatos() 
  {
    let xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let obj = JSON.parse(this.responseText);
                let x = 0;
                
                let valor = (obj[x].local).localeCompare("undefined");
                if(valor!=0){
                        for (x=0;x<obj.length;x++) {
                        let linha = obj[x];
                        criarLinhaTabela(linha);
                    }
                }
            }
        }
        xmlHttp.open("GET", "http://localhost/3DAW/AV2/Listar.php");
        xmlHttp.send();
  }
  
  function criarLinhaTabela(linha) 
  {
    let tabela = document.getElementById("tabela");
    let tr = document.createElement("tr");
    
    //Nome
    let tdnome = document.createElement("td"); 
    textnode = document.createTextNode(linha.nome);
    tdnome.appendChild(textnode); 
    tr.appendChild(tdnome);
  
    //CPF
    let tdcpf = document.createElement("td"); 
    textnode = document.createTextNode(linha.cpf);
    tdcpf.appendChild(textnode); 
    tr.appendChild(tdcpf); 
  
    //ID
    let tdid = document.createElement("td");
    textnode = document.createTextNode(linha.id);
    tdid.appendChild(textnode); 
    tr.appendChild(tdid);
  
    //Email
    let tdemail = document.createElement("td");
    textnode = document.createTextNode(linha.email);
    tdemail.appendChild(textnode); 
    tr.appendChild(tdemail);

    //Cargo
    let tdcargo = document.createElement("td");
    textnode = document.createTextNode(linha.cargo);
    tdcargo.appendChild(textnode); 
    tr.appendChild(tdcargo);

    //Sala
    let tdsala = document.createElement("td");
    textnode = document.createTextNode(linha.sala);
    tdsala.appendChild(textnode); 
    tr.appendChild(tdsala);

  }

 //Funções da funcionalidade de Alterar
 function enviarForm() {
  let cpf = document.getElementById("cpf").value;
  let salaAlterada = document.getElementById("salaAlterada").value;

  let xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", "http://localhost/3DAW/TrabalhoCopa/alterarSelecao.php?cpf=" + cpf + "&sala=" + salaAlterada);
  xmlHttp.send();

  location.reload();
}

function buscarSelecao() {
  let cpf = document.getElementById("cpf").value;
  let xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function () {
    console.log("mudou status: " + this.readyState);
    if (this.readyState == 4 && this.status == 200) {
      let obj = this.responseText;

      document.getElementById("salaAlterada").value = obj;

      let formAlt = document.getElementById("formAlterar");
      formAlt.style.display = "block";
    }
  };
  xmlHttp.open("GET", "http://localhost/3DAW/AV2/Alterar.php?cpf=" + cpf);
  xmlHttp.send();
}

  

  
