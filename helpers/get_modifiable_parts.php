<?php

//Header de la pagina
function getPageheader(){
    $header =   '<div class="page2-header">
                    <div class="page2-header__column1">
                        <div class="page2-header__img-container">
                            <img src="http://localhost/pdf-plugin/assets/img/kalstein.jpg" alt="logo de kalstein">
                        </div>
                        <p>KALSTEIN FRANCE SIREN: 819 970 815</p>
                    </div>
                    <div class="page2-header__column2">
                        <div class="page2-header__text-container">
                                <span><b>Cotización N°</b>- QUO135</span>
                                <span>Paris, 18-07-2022 10:00 AM</span>
                        </div>
                    </div>
                </div>';
    return $header;
}
//Autor(es)
function getPageAuthors(){
    $authors =  '<div class="page2-authors">
                    <div class="page2-authors_text">
                        <span><b>Señores</b></span>
                        <span>Juan Carlos</span>
                    </div>
                    <div class="page2-authors_text">
                        <span><b>Atención</b></span>
                        <span>Juan Carlos</span>
                    </div>
                </div>';
    return $authors;
}
//Datos de logistica
function getLogisticData($suma_total = 0){
    $logistica = '
    <div class="datos-logistica">
        <div class="observaciones">
            <div class="row-observaciones observaciones_first">
                <span class="tiempos-entrega"><b>Observaciones<br>tiempos de entrega:</b></span>
                <span class="tiempos-entrega-value">45 dias aprox</span>
            </div>
            <div class="row-observaciones">
                <span class="tiempos-entrega"><b>Representante de Ventas</b></span>
                <div class="value-fields">
                    <span>YULEANA Mia</span>
                    <span>Email: mia@kalstein.eu</span>
                    <span>Tlf: +33 1 78 95 87 89/ +33 6 80 76 07 10</span>
                </div>
            </div>
            <div class="row-observaciones">
                <span class="tiempos-entrega"><b>Terminos Comerciales:</b></span>
                <div class="value-fields">
                    <span>Prepago con Orden de Compra.</span>
                    <span>Descuento Especial (18%), aplicado.</span>
                </div>
            </div>
            <div class="row-observaciones">
                <span class="tiempos-entrega"><b>Incoterm:</b></span>
                <div class="value-fields">
                    <span>EXW Kalstein Shanghai</span>
                </div>
            </div>
            <div class="row-observaciones">
                <span class="tiempos-entrega"><b>Moneda:</b></span>
                <div class="value-fields">
                    <span>EUR</span>
                </div>
            </div>
            <div class="row-observaciones garantia">
                <span class="tiempos-entrega"><b>Garantia:</b></span>
                <div class="value-fields">
                    <span>1 año contra defectos de fabrica</span>
                </div>
            </div>
            <div class="row-observaciones">
                <span class="tiempos-entrega"><b>Metodos de Pago:</b></span>
                <div class="value-fields">
                    <ul>
                        <li>Transferencia Bancaria</li>
                        <li>Trajeta de Credito/Debito (Pasarela de Pago)</li>
                        <li>Paypal</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-results">
            <div class="results-column-title">
                <span>Subtotal</span>
                <span>IVA</span>
                <span>Descuento</span>
                <span>Subtotal</span>
                <span>Envio</span>
                <span>Total</span>
            </div>
            <div class="results-column-value">
                <span>' . number_format($suma_total,2,',','.') .'$</span>
                <span>0,00$</span>
                <span>9.876,96$</span>
                <span>44.995,04$</span>
                <span>0,00$</span>
                <span>44.995,04$</span>

            </div>
        </div>    
    </div>';
    return $logistica;

}

//Footer de pagina
function getPageFooter(){
    $footer = '
    <div class="page2-footer">
            <div class="page2-footer-top clearfix">
                    <div class="footer-top-content clearfix">
                        <div class="footer-top-icon">
                            <img src="http://localhost/pdf-plugin/assets/img/img-ce.jpg" alt="icono3">
                        </div>
                        <div class="footer-top-text">
                            <p><b>Marcado CE: para comprar con tranquilidad</b></p>
                            <p class="top-text_subtitle">Todos los equipos de Kalstein cumplen con los requisitos de la UE, de acuerdo con las regulaciones pertinentes</p>
                        </div>
                    </div>
                    <div class="footer-top-content">
                        <div class="footer-top-icon">
                            <img src="http://localhost/pdf-plugin/assets/img/icono3.png" alt="icono3">
                        </div>
                        <div class="footer-top-text">
                            <p><b>Con la adquision de un equipo Kalstein</b></p>
                            <p class="top-text_subtitle">usted hace una contribucion a la Fundacion Jacinto Convit, OneTreePlanted, Humatem Foundation y la Fundacion Maniapure.</p>
                        </div>
                    </div>   
            </div>
            <div class="page2-footer-bottom">
                <div class="footer-bottom-content">
                    <p class="bottom-content-p">
                        KALSTEIN FRANCE S.A.S• 2 Rue Jean Lantier, • 75001 Paris •+33 1 78 95 87 89 / +33 6 80 76 07 10 • https://kalstein.eu
                    </p>
                    <span class="bottom-content-span"></span>
                </div>
            </div>
        </div>';
    return $footer;
}
//marcador de pagina
function getMarker(){
    $marker = '<div class="page2-marker">pagina 3 de 5</div>';
    return $marker;
}
