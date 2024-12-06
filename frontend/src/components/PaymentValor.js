import React from "react";
import "../styles/PaymentScreen.css";

const PaymentValor = () =>{
    return (
        <div className="rightContent">
        <h1 className="Pix">Chave Pix <button className="botao-Copia" id="copiarPix">Copiar</button> </h1>
        <input type="text" id="ChavePix" className="ChavePix" value="12345678900" readOnly/>
         <h1 className="Valor">Valor Total</h1>
                    <input type="text" className="valorTotal" value="00,00" readOnly/>
                    <button className="aguardarPedido">Aguardar Pedido</button>
        </div>

    );
};
export default PaymentValor;