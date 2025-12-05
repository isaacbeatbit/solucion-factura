<!-- ============================================
     POPUP 1: NUEVA FUNCIÓN (Inferior Izquierda)
     SE MUESTRA CADA HORA
     INICIO
     ============================================ -->
<div id="feature-popup" class="new-feature-popup hidden">
    <div class="popup-content popup-bottom-left">
        <button class="popup-close" onclick="closeFeaturePopup()">&times;</button>
        <div class="popup-icon">
            <div class="icon-badge">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#2196F3" width="30" height="30">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                </svg>
            </div>
        </div>
        <h3>🎉 ¡Nueva Función!</h3>
        <h4>Complemento de Pago</h4>
        
        <div class="popup-image-container">
            <img src="https://solucionfactura.mx/images/pgos.jpeg" alt="Complemento de Pago" class="popup-feature-image">
        </div>
        
        <p>Desde el menú <strong>Acciones</strong> genera complementos con prellenado automático.</p>
        
        <div class="feature-highlight">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#4CAF50" width="16" height="16">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
            </svg>
            <span>Relaciona automáticamente PPD</span>
        </div>
        
        <button onclick="closeFeaturePopup()" class="popup-btn">
            ¡Entendido!
        </button>
    </div>
</div>
<!-- ============================================
     POPUP 1: NUEVA FUNCIÓN
     FIN
     ============================================ -->


<!-- ============================================
     POPUP 2: TICKET DE SOPORTE (Formulario)
     BOTÓN VISIBLE SIEMPRE - MITAD DERECHA
     INICIO
     ============================================ -->

<!-- Botón Pestaña - SIEMPRE VISIBLE EN LA MITAD DERECHA -->
<button onclick="openTicketPopup()" class="ticket-tab-btn">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">
        <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
    </svg>
    <span>TICKET DE SOPORTE</span>
</button>

<!-- Popup del Formulario -->
<div id="ticket-popup" class="ticket-popup hidden">
    <div class="ticket-popup-overlay" onclick="closeTicketPopup()"></div>
    <div class="ticket-popup-content">
        <button class="ticket-popup-close" onclick="closeTicketPopup()">&times;</button>
        
        <div class="ticket-popup-header">
            <div class="ticket-icon-badge">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#FF6B35" width="30" height="30">
                    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                </svg>
            </div>
            <h3>📋 Crear Ticket de Soporte</h3>
            <p class="ticket-subtitle">Completa los siguientes datos y nos pondremos en contacto</p>
        </div>

        <form id="ticketSupportForm" class="ticket-popup-form">
            <!-- INBOX oculto -->
            <input type="hidden" name="inbox_email" value="soporte@solucion-factura.tickos.dev">
            
            <!-- Asignar a (oculto) -->
            <input type="hidden" name="assigned_to" value="contacto@solucionfiscal.mx">
            
            <!-- Metadatos ocultos -->
            <input type="hidden" name="metadata[user_id]" value="">
            <input type="hidden" name="metadata[plan]" value="">
            <input type="hidden" name="metadata[browser]" id="popup_metadata_browser" value="">
            <input type="hidden" name="metadata[os]" id="popup_metadata_os" value="">
            <input type="hidden" name="metadata[source]" value="popup">
            
            <!-- Información de contacto -->
            <div class="ticket-form-section">
                <h4 class="ticket-section-title">Información de Contacto</h4>
                
                <div class="ticket-form-group">
                    <label for="popup_customer_email">Email *</label>
                    <input type="email" id="popup_customer_email" name="customer_email" placeholder="tu@email.com" required>
                </div>

                <div class="ticket-form-group">
                    <label for="popup_customer_name">Nombre completo</label>
                    <input type="text" id="popup_customer_name" name="customer_name" placeholder="Juan Pérez">
                </div>

                <div class="ticket-form-group">
                    <label for="popup_customer_phone">Teléfono *</label>
                    <div class="ticket-phone-group">
                        <select id="popup_customer_lada" name="customer_lada" class="ticket-lada-select" required>
                            <option value="+52">+52</option>
                            <option value="+1">+1</option>
                        </select>
                        <input type="tel" id="popup_customer_phone" name="customer_phone" placeholder="5512345678" maxlength="10" required pattern="[0-9]{10}">
                    </div>
                </div>
            </div>

            <!-- Detalles del problema -->
            <div class="ticket-form-section">
                <h4 class="ticket-section-title">Detalles del Problema</h4>
                
                <div class="ticket-form-group">
                    <label for="popup_customer_group">Sistema afectado</label>
                    <select id="popup_customer_group" name="customer_group">
                        <option value="">Seleccionar...</option>
                        <option value="Sistema de facturacion">Sistema de facturación</option>
                        <option value="Sistema contable">Sistema contable</option>
                        <option value="Sistema Descarga XML">Sistema Descarga XML</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="ticket-form-group">
                    <label for="popup_priority">Prioridad</label>
                    <select id="popup_priority" name="priority">
                        <option value="normal">Normal</option>
                        <option value="low">Baja</option>
                        <option value="medium">Media</option>
                        <option value="high">Alta</option>
                        <option value="urgent">Urgente</option>
                    </select>
                </div>

                <div class="ticket-form-group">
                    <label for="popup_subject">Asunto *</label>
                    <input type="text" id="popup_subject" name="subject" placeholder="Resumen breve del problema" required>
                </div>

                <div class="ticket-form-group">
                    <label for="popup_message">Descripción del problema *</label>
                    <textarea id="popup_message" name="message" rows="5" placeholder="Describe detalladamente qué sucedió, qué esperabas que sucediera y los pasos para reproducir el problema..." required></textarea>
                </div>
            </div>

            <!-- Archivos adjuntos -->
            <div class="ticket-form-section">
                <h4 class="ticket-section-title">Archivos Adjuntos (Opcional)</h4>
                
                <input type="file" id="popup_attachments" name="attachments" multiple class="hidden">
                
                <div id="popup_dropZone" class="ticket-dropzone">
                    <svg class="ticket-upload-icon" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="ticket-dropzone-text">Arrastra archivos o haz clic para seleccionar</p>
                    <p class="ticket-dropzone-subtext">PNG, JPG, PDF hasta 10MB</p>
                </div>
                
                <div id="popup_fileList" class="ticket-file-list"></div>
            </div>

            <div class="ticket-form-buttons">
                <button type="button" onclick="closeTicketPopup()" class="ticket-btn-cancel">Cancelar</button>
                <button type="submit" class="ticket-btn-submit">Enviar Ticket de Soporte</button>
            </div>
        </form>
        
        <!-- Respuesta del servidor -->
        <div id="popup_responseContainer" class="ticket-response-container hidden">
            <div class="ticket-response-content">
                <div id="popup_responseIcon" class="ticket-response-icon"></div>
                <div class="ticket-response-text">
                    <h3 id="popup_responseTitle" class="ticket-response-title"></h3>
                    <pre id="popup_responseBox" class="ticket-response-box"></pre>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================
     POPUP 2: TICKET DE SOPORTE
     FIN
     ============================================ -->


<style>
/* ============================================
   ESTILOS POPUP 1: NUEVA FUNCIÓN
   ============================================ */
.new-feature-popup {
    position: fixed;
    bottom: 20px;
    left: 20px;
    z-index: 9998;
}

.new-feature-popup.hidden {
    display: none;
}

.popup-content {
    position: relative;
    background: white;
    border-radius: 16px;
    padding: 20px;
    width: 320px;
    text-align: center;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    animation: popupSlideInLeft 0.5s ease-out;
}

.popup-bottom-left {
    border-top: 3px solid #2196F3;
}

@keyframes popupSlideInLeft {
    from {
        opacity: 0;
        transform: translateX(-100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes popupSlideOutLeft {
    from {
        opacity: 1;
        transform: translateX(0);
    }
    to {
        opacity: 0;
        transform: translateX(-100px);
    }
}

.popup-close {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 24px;
    color: #999;
    cursor: pointer;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.2s;
    line-height: 1;
}

.popup-close:hover {
    background: #f0f0f0;
    color: #333;
    transform: rotate(90deg);
}

.popup-icon {
    margin-bottom: 12px;
}

.icon-badge {
    display: inline-flex;
    background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(33, 150, 243, 0.4);
    }
    50% {
        transform: scale(1.05);
        box-shadow: 0 0 0 8px rgba(33, 150, 243, 0);
    }
}

.popup-content h3 {
    color: #1976D2;
    font-size: 18px;
    margin-bottom: 5px;
    font-weight: 700;
}

.popup-content h4 {
    color: #333;
    font-size: 15px;
    margin-bottom: 12px;
    font-weight: 600;
}

.popup-image-container {
    margin: 12px 0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
    border: 2px solid #E3F2FD;
}

.popup-feature-image {
    width: 100%;
    height: auto;
    display: block;
    max-height: 150px;
    object-fit: contain;
}

.popup-content p {
    color: #555;
    font-size: 13px;
    line-height: 1.5;
    margin-bottom: 12px;
}

.feature-highlight {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: #F1F8E9;
    padding: 10px 12px;
    border-radius: 8px;
    margin: 12px 0;
    border-left: 3px solid #4CAF50;
}

.feature-highlight span {
    color: #388E3C;
    font-weight: 600;
    font-size: 12px;
}

.popup-btn {
    display: inline-block;
    background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
    color: white;
    text-decoration: none;
    padding: 10px 24px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.3s;
    box-shadow: 0 3px 12px rgba(33, 150, 243, 0.3);
    border: none;
    cursor: pointer;
    margin-top: 8px;
}

.popup-btn:hover {
    background: linear-gradient(135deg, #1976D2 0%, #1565C0 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 16px rgba(33, 150, 243, 0.4);
}

/* ============================================
   ESTILOS POPUP 2: TICKET DE SOPORTE
   ============================================ */

/* Botón Pestaña */
.ticket-tab-btn {
    position: fixed;
    right: -75px;
    top: 50%;
    transform: translateY(-50%) rotate(-90deg);
    transform-origin: center center;
    background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%);
    color: white;
    border: none;
    padding: 14px 28px;
    border-radius: 12px 12px 0 0;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: -2px 2px 15px rgba(255, 107, 53, 0.5);
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    z-index: 9998;
    letter-spacing: 0.8px;
    text-transform: uppercase;
}

.ticket-tab-btn:hover {
    right: -65px;
    box-shadow: -3px 3px 20px rgba(255, 107, 53, 0.7);
    background: linear-gradient(135deg, #F7931E 0%, #FF6B35 100%);
}

.ticket-tab-btn svg {
    transform: rotate(90deg);
    flex-shrink: 0;
}

/* Popup del formulario */
.ticket-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ticket-popup.hidden {
    display: none;
}

.ticket-popup-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
}

.ticket-popup-content {
    position: relative;
    background: white;
    border-radius: 20px;
    padding: 30px;
    max-width: 600px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
    animation: ticketPopupFadeIn 0.3s ease-out;
}

@keyframes ticketPopupFadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.ticket-popup-close {
    position: absolute;
    top: 15px;
    right: 15px;
    background: none;
    border: none;
    font-size: 28px;
    color: #999;
    cursor: pointer;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.2s;
    line-height: 1;
}

.ticket-popup-close:hover {
    background: #f0f0f0;
    color: #333;
    transform: rotate(90deg);
}

/* Header del popup */
.ticket-popup-header {
    text-align: center;
    margin-bottom: 25px;
}

.ticket-icon-badge {
    display: inline-flex;
    background: linear-gradient(135deg, #FFE5D9 0%, #FFD4C3 100%);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
}

.ticket-popup-header h3 {
    color: #FF6B35;
    font-size: 24px;
    margin-bottom: 5px;
    font-weight: 700;
}

.ticket-subtitle {
    color: #666;
    font-size: 14px;
    margin: 0;
}

/* Formulario */
.ticket-popup-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.ticket-form-section {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.ticket-section-title {
    color: #333;
    font-size: 16px;
    font-weight: 700;
    margin: 0 0 10px 0;
    padding-bottom: 8px;
    border-bottom: 2px solid #FFE5D9;
}

.ticket-form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.ticket-form-group label {
    color: #333;
    font-size: 14px;
    font-weight: 600;
}

.ticket-form-group input,
.ticket-form-group select,
.ticket-form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #E0E0E0;
    border-radius: 10px;
    font-size: 14px;
    font-family: inherit;
    transition: all 0.3s;
    box-sizing: border-box;
}

.ticket-form-group input:focus,
.ticket-form-group select:focus,
.ticket-form-group textarea:focus {
    outline: none;
    border-color: #FF6B35;
    box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
}

.ticket-form-group textarea {
    resize: vertical;
    min-height: 100px;
}

.ticket-form-group select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    padding-right: 35px;
}

/* Grupo de teléfono */
.ticket-phone-group {
    display: flex;
    gap: 10px;
}

.ticket-lada-select {
    width: 90px !important;
    flex-shrink: 0;
}

.ticket-phone-group input {
    flex: 1;
    width: auto !important;
}

/* Dropzone */
.ticket-dropzone {
    border: 2px dashed #E0E0E0;
    border-radius: 12px;
    padding: 30px 20px;
    text-align: center;
    cursor: pointer;
    background: #FAFAFA;
    transition: all 0.3s;
}

.ticket-dropzone:hover {
    border-color: #FF6B35;
    background: #FFF5F0;
}

.ticket-upload-icon {
    width: 48px;
    height: 48px;
    margin: 0 auto 12px;
    color: #999;
}

.ticket-dropzone-text {
    color: #333;
    font-size: 14px;
    font-weight: 600;
    margin: 0 0 5px 0;
}

.ticket-dropzone-subtext {
    color: #999;
    font-size: 12px;
    margin: 0;
}

.ticket-file-list {
    margin-top: 12px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

/* Botones del formulario */
.ticket-form-buttons {
    display: flex;
    gap: 12px;
    margin-top: 10px;
}

.ticket-btn-cancel,
.ticket-btn-submit {
    flex: 1;
    padding: 14px 20px;
    border: none;
    border-radius: 12px;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s;
}

.ticket-btn-cancel {
    background: #F5F5F5;
    color: #666;
}

.ticket-btn-cancel:hover {
    background: #E0E0E0;
}

.ticket-btn-submit {
    background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
}

.ticket-btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
}

.ticket-btn-submit:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
}

/* Respuesta del servidor */
.ticket-response-container {
    border-top: 2px solid #E0E0E0;
    padding-top: 20px;
    margin-top: 20px;
}

.ticket-response-container.hidden {
    display: none;
}

.ticket-response-content {
    display: flex;
    gap: 15px;
    align-items: start;
}

.ticket-response-icon {
    flex-shrink: 0;
    width: 40px;
    height: 40px;
}

.ticket-response-text {
    flex: 1;
}

.ticket-response-title {
    color: #333;
    font-size: 16px;
    font-weight: 700;
    margin: 0 0 10px 0;
}

.ticket-response-box {
    color: #666;
    font-size: 13px;
    font-family: monospace;
    white-space: pre-wrap;
    word-wrap: break-word;
    margin: 0;
    max-height: 200px;
    overflow-y: auto;
}

/* Scrollbar personalizado */
.ticket-popup-content::-webkit-scrollbar,
.ticket-response-box::-webkit-scrollbar {
    width: 8px;
}

.ticket-popup-content::-webkit-scrollbar-track,
.ticket-response-box::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.ticket-popup-content::-webkit-scrollbar-thumb,
.ticket-response-box::-webkit-scrollbar-thumb {
    background: #FF6B35;
    border-radius: 10px;
}

.ticket-popup-content::-webkit-scrollbar-thumb:hover,
.ticket-response-box::-webkit-scrollbar-thumb:hover {
    background: #F7931E;
}

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width: 768px) {
    .new-feature-popup {
        bottom: 100px;
        left: 10px;
    }
    
    .popup-content {
        width: 280px;
        padding: 18px;
    }
    
    .ticket-tab-btn {
        right: -85px;
        padding: 12px 24px;
        font-size: 11px;
    }
    
    .ticket-tab-btn:hover {
        right: -75px;
    }
    
    .ticket-popup-content {
        padding: 25px 20px;
        max-width: 95%;
    }
    
    .ticket-form-buttons {
        flex-direction: column;
    }
    
    .ticket-btn-cancel,
    .ticket-btn-submit {
        width: 100%;
    }
    
    .ticket-phone-group {
        flex-direction: column;
    }
    
    .ticket-lada-select {
        width: 100% !important;
    }
}

@media (max-width: 480px) {
    .popup-content {
        width: calc(100vw - 40px);
        max-width: 280px;
    }
    
    .ticket-tab-btn {
        right: -90px;
        padding: 10px 20px;
        font-size: 10px;
    }
    
    .ticket-popup-header h3 {
        font-size: 20px;
    }
    
    .ticket-section-title {
        font-size: 14px;
    }
}
</style>

<script>
/* ============================================
   VARIABLES GLOBALES
   ============================================ */
let selectedFiles = [];

/* ============================================
   CONFIGURACIÓN
   ============================================ */
const WEBHOOK_URL = "https://flow.wabotify.com/webhook/create-ticket";

/* ============================================
   JAVASCRIPT POPUP 1: NUEVA FUNCIÓN
   ============================================ */
window.closeFeaturePopup = function() {
    const popup = document.getElementById('feature-popup');
    if (popup) {
        popup.style.animation = 'popupSlideOutLeft 0.3s ease-in';
        setTimeout(() => popup.classList.add('hidden'), 300);
        localStorage.setItem('featurePopupLastShown', Date.now());
    }
};

window.shouldShowFeaturePopup = function() {
    const lastShown = localStorage.getItem('featurePopupLastShown');
    if (!lastShown) return true;
    const oneHour = 60 * 60 * 1000;
    return (Date.now() - parseInt(lastShown)) >= oneHour;
};

/* ============================================
   JAVASCRIPT POPUP 2: TICKET DE SOPORTE
   ============================================ */
window.openTicketPopup = function() {
    const popup = document.getElementById('ticket-popup');
    if (popup) {
        popup.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
};

window.closeTicketPopup = function() {
    const popup = document.getElementById('ticket-popup');
    const form = document.getElementById('ticketSupportForm');
    const fileList = document.getElementById('popup_fileList');
    const responseContainer = document.getElementById('popup_responseContainer');
    
    if (popup) {
        popup.classList.add('hidden');
        document.body.style.overflow = '';
    }
    if (form) form.reset();
    if (fileList) fileList.innerHTML = '';
    if (responseContainer) responseContainer.classList.add('hidden');
    
    // Limpiar archivos
    selectedFiles = [];
};

// Convertir archivo a Base64
function toBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = () => resolve({
            fileName: file.name,
            fileData: reader.result.split(',')[1],
            contentType: file.type
        });
        reader.onerror = reject;
        reader.readAsDataURL(file);
    });
}

// Capturar información del navegador y OS
function captureMetadata() {
    const userAgent = navigator.userAgent;
    let browser = "Desconocido";
    let os = "Desconocido";

    if (userAgent.indexOf("Firefox") > -1) browser = "Firefox";
    else if (userAgent.indexOf("Chrome") > -1) browser = "Chrome";
    else if (userAgent.indexOf("Safari") > -1) browser = "Safari";
    else if (userAgent.indexOf("Edge") > -1) browser = "Edge";

    if (userAgent.indexOf("Win") > -1) os = "Windows";
    else if (userAgent.indexOf("Mac") > -1) os = "MacOS";
    else if (userAgent.indexOf("Linux") > -1) os = "Linux";
    else if (userAgent.indexOf("Android") > -1) os = "Android";
    else if (userAgent.indexOf("iOS") > -1) os = "iOS";

    const browserInput = document.getElementById('popup_metadata_browser');
    const osInput = document.getElementById('popup_metadata_os');
    
    if (browserInput) browserInput.value = browser;
    if (osInput) osInput.value = os;
}

// Manejo del envío del formulario
function initTicketForm() {
    const form = document.getElementById('ticketSupportForm');
    
    if (!form) return;
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = form.querySelector('.ticket-btn-submit');
        const responseContainer = document.getElementById('popup_responseContainer');
        const responseTitle = document.getElementById('popup_responseTitle');
        const responseBox = document.getElementById('popup_responseBox');
        const responseIcon = document.getElementById('popup_responseIcon');
        
        if (!submitBtn) return;
        
        const originalBtnContent = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Enviando...';
        
        // Capturar metadatos antes de enviar
        captureMetadata();
        
        try {
            const formData = new FormData(form);
            
            // Metadatos
            const metadata = {
                user_id: formData.get('metadata[user_id]') || '',
                plan: formData.get('metadata[plan]') || '',
                browser: formData.get('metadata[browser]') || '',
                os: formData.get('metadata[os]') || '',
                source: formData.get('metadata[source]') || 'popup'
            };
            
            // Preparar adjuntos
            const attachments = [];
            for (let f of selectedFiles) {
                attachments.push(await toBase64(f));
            }
            
            // Formatear el número de WhatsApp
            let lada = formData.get('customer_lada') || '+52';
            let phone = (formData.get('customer_phone') || '').replace(/[^0-9]/g, '');
            let customer_phone = '';
            if (lada === '+52' && phone.length === 10) {
                customer_phone = `+521${phone}`;
            } else if (lada === '+1' && phone.length === 10) {
                customer_phone = `+11${phone}`;
            } else {
                customer_phone = `${lada}${phone}`;
            }
            
            // JSON final
            const body = {
                inbox_email: formData.get('inbox_email'),
                customer_email: formData.get('customer_email'),
                customer_name: formData.get('customer_name'),
                customer_phone,
                customer_group: formData.get('customer_group'),
                subject: formData.get('subject'),
                message: formData.get('message'),
                priority: formData.get('priority'),
                assigned_to: formData.get('assigned_to'),
                metadata,
                attachments
            };
            
            const res = await fetch(WEBHOOK_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(body)
            });
            
            const data = await res.json();
            
            if (responseContainer) responseContainer.classList.remove('hidden');
            
            if (res.ok) {
                // Éxito
                if (responseIcon) {
                    responseIcon.innerHTML = '<svg style="width: 40px; height: 40px; color: #4CAF50;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                }
                if (responseTitle) {
                    responseTitle.textContent = '¡Ticket enviado exitosamente!';
                    responseTitle.style.color = '#4CAF50';
                }
                if (responseBox) {
                    responseBox.textContent = 'Tu solicitud ha sido recibida. Nos pondremos en contacto contigo pronto.';
                }
                
                setTimeout(() => {
                    window.closeTicketPopup();
                }, 3000);
            } else {
                // Error del servidor
                if (responseIcon) {
                    responseIcon.innerHTML = '<svg style="width: 40px; height: 40px; color: #f44336;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                }
                if (responseTitle) {
                    responseTitle.textContent = 'Error al enviar el ticket';
                    responseTitle.style.color = '#f44336';
                }
                if (responseBox) {
                    responseBox.textContent = data.message || 'Ocurrió un error al procesar tu solicitud. Por favor, intenta nuevamente.';
                }
            }
        } catch (error) {
            // Error de conexión
            if (responseContainer) responseContainer.classList.remove('hidden');
            if (responseIcon) {
                responseIcon.innerHTML = '<svg style="width: 40px; height: 40px; color: #f44336;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
            }
            if (responseTitle) {
                responseTitle.textContent = 'Error de conexión';
                responseTitle.style.color = '#f44336';
            }
            if (responseBox) {
                responseBox.textContent = 'No se pudo conectar con el servidor. Por favor, verifica tu conexión a internet e intenta nuevamente.\n\nError: ' + error.message;
            }
            console.error('Error al enviar ticket:', error);
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = originalBtnContent;
            }
        }
    });
}

// Dropzone functionality
function initTicketDropzone() {
    const dropZone = document.getElementById('popup_dropZone');
    const fileInput = document.getElementById('popup_attachments');
    const fileList = document.getElementById('popup_fileList');
    
    if (!dropZone || !fileInput) return;
    
    dropZone.addEventListener('click', () => fileInput.click());
    
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.style.borderColor = '#FF6B35';
        dropZone.style.background = '#FFF5F0';
    });
    
    dropZone.addEventListener('dragleave', () => {
        dropZone.style.borderColor = '#E0E0E0';
        dropZone.style.background = '#FAFAFA';
    });
    
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.style.borderColor = '#E0E0E0';
        dropZone.style.background = '#FAFAFA';
        
        if (e.dataTransfer && e.dataTransfer.files) {
            selectedFiles = Array.from(e.dataTransfer.files);
            displayFiles(selectedFiles);
        }
    });
    
    fileInput.addEventListener('change', (e) => {
        if (e.target.files) {
            selectedFiles = Array.from(e.target.files);
            displayFiles(selectedFiles);
        }
    });
    
    function displayFiles(files) {
        if (!fileList) return;
        
        fileList.innerHTML = '';
        Array.from(files).forEach((file, index) => {
            const fileItem = document.createElement('div');
            fileItem.style.cssText = 'display:flex;align-items:center;justify-content:space-between;padding:10px;background:#F5F5F5;border-radius:8px;';
            
            const fileInfo = document.createElement('div');
            fileInfo.style.cssText = 'flex:1;min-width:0;';
            
            const fileName = document.createElement('span');
            fileName.style.cssText = 'font-size:13px;color:#333;font-weight:600;display:block;';
            fileName.textContent = file.name;
            
            const fileSize = document.createElement('span');
            fileSize.style.cssText = 'font-size:12px;color:#999;display:block;margin-top:2px;';
            fileSize.textContent = (file.size / 1024).toFixed(2) + ' KB';
            
            const removeBtn = document.createElement('button');
            removeBtn.textContent = '×';
            removeBtn.type = 'button';
            removeBtn.style.cssText = 'background:none;border:none;color:#999;font-size:20px;cursor:pointer;padding:0;width:24px;height:24px;display:flex;align-items:center;justify-content:center;border-radius:50%;transition:all 0.2s;';
            removeBtn.onmouseover = () => {
                removeBtn.style.background = '#FFE5D9';
                removeBtn.style.color = '#FF6B35';
            };
            removeBtn.onmouseout = () => {
                removeBtn.style.background = 'none';
                removeBtn.style.color = '#999';
            };
            removeBtn.onclick = () => {
                selectedFiles.splice(index, 1);
                displayFiles(selectedFiles);
            };
            
            fileInfo.appendChild(fileName);
            fileInfo.appendChild(fileSize);
            fileItem.appendChild(fileInfo);
            fileItem.appendChild(removeBtn);
            fileList.appendChild(fileItem);
        });
    }
}

/* ============================================
   EVENT LISTENERS GLOBALES
   ============================================ */
document.addEventListener('DOMContentLoaded', function() {
    // Popup 1: Nueva Función
    if (window.shouldShowFeaturePopup && window.shouldShowFeaturePopup()) {
        setTimeout(() => {
            const popup = document.getElementById('feature-popup');
            if (popup) popup.classList.remove('hidden');
        }, 2000);
    }
    
    // Popup 2: Inicializar formulario y dropzone
    initTicketForm();
    initTicketDropzone();
    
    // Capturar metadatos al cargar la página
    captureMetadata();
});

// Cerrar con ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const ticketPopup = document.getElementById('ticket-popup');
        if (ticketPopup && !ticketPopup.classList.contains('hidden')) {
            window.closeTicketPopup();
        }
    }
});
</script>