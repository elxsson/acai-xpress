import React from "react";
import "../styles/ProcessingAddress.css";

const ProcessingAddress = () =>{
    function adicionarEndereco() {
        const endereco = prompt("Digite seu endereco");
    
        if (endereco){
            document.getElementById("enderecoInput").value = endereco;
        }
    }
    return (
        <div className="enderecoDiv">
            <p className="endereco">Endereço:</p> 
            <input type="text" value="" id="enderecoInput" readOnly />
            <button className="addEndereco" onClick={() => adicionarEndereco()}>Adicionar Endereço</button>
        </div>

    );
};
export default ProcessingAddress;