<!-- Floating Chat Widget -->
<div id="chatWidget" class="chat-widget">
    <div id="chatToggle" class="chat-toggle">
        <i class="fa fa-comments"></i>
        <span class="chat-notification" id="chatNotification" style="display: none;">1</span>
    </div>

    <div id="chatWindow" class="chat-window" style="display: none;">
        <div class="chat-header">
            <div class="chat-header-info">
                <div class="admin-avatar">👨‍💼</div>
                <div>
                    <h6>{{ __('messages.admin_chat') ?? 'Admin Support' }}</h6>
                    <span class="status online">{{ __('messages.online') ?? 'Online' }}</span>
                </div>
            </div>
            <button id="chatClose" class="chat-close">×</button>
        </div>

        <div class="chat-messages" id="chatMessages">
            <div class="message admin-message">
                <div class="message-content">
                    <p>{{ __('messages.welcome_message') ?? 'Hi! How can I help you today?' }}</p>
                    <span class="message-time">{{ now()->format('H:i') }}</span>
                </div>
            </div>
        </div>

        <div class="chat-input-container">
            <form id="chatForm">
                @csrf
                <div class="chat-input-wrapper">
                    <input type="text"
                           id="chatInput"
                           placeholder="{{ __('messages.type_message') ?? 'Type your message...' }}"
                           required>
                    <button type="submit" class="chat-send-btn">
                        <i class="fa fa-paper-plane"></i>
                    </button>
                </div>

                <!-- Contact Info Form (shown initially) -->
                <div id="contactInfoForm" class="contact-info-form">
                    <div class="form-group mb-2">
                        <input type="text"
                               id="userName"
                               class="form-control"
                               placeholder="{{ __('messages.your_name') ?? 'Your Name' }}"
                               required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="email"
                               id="userEmail"
                               class="form-control"
                               placeholder="{{ __('messages.your_email') ?? 'Your Email' }}"
                               required>
                    </div>
                    <button type="button" id="startChatBtn" class="btn btn-primary btn-sm w-100">
                        {{ __('messages.start_chat') ?? 'Start Chat' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.chat-widget {
    position: fixed !important;
    bottom: 20px !important;
    right: 20px !important;
    z-index: 999999 !important;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    pointer-events: auto !important;
    visibility: visible !important;
    display: block !important;
}

.chat-toggle {
    width: 60px !important;
    height: 60px !important;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: white !important;
    font-size: 24px !important;
    cursor: pointer !important;
    box-shadow: 0 4px 20px rgba(102, 126, 234, 0.4) !important;
    transition: all 0.3s ease !important;
    position: relative !important;
    animation: pulse 2s infinite !important;
    z-index: 999999 !important;
    border: 2px solid rgba(255, 255, 255, 0.3) !important;
}

.chat-toggle:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 25px rgba(102, 126, 234, 0.6);
}

@keyframes pulse {
    0% { box-shadow: 0 4px 20px rgba(102, 126, 234, 0.4); }
    50% { box-shadow: 0 4px 20px rgba(102, 126, 234, 0.8); }
    100% { box-shadow: 0 4px 20px rgba(102, 126, 234, 0.4); }
}

.chat-notification {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #ff4757;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
}

    /* Hidden by default to avoid intercepting pointer events on the page.
       When the widget is opened the `.show` class will make it visible. */
    .chat-window {
        position: fixed !important;
        bottom: 90px !important;
        right: 20px !important;
        width: 350px !important;
        height: 500px !important;
        background: white !important;
        border-radius: 20px !important;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.25) !important;
        border: 2px solid rgba(102, 126, 234, 0.1) !important;
        display: none; /* don't force visible with !important */
        flex-direction: column;
        overflow: hidden !important;
        transform: translateY(20px) scale(0.9);
        opacity: 0;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        z-index: 999999 !important;
        max-height: calc(100vh - 120px) !important;
        pointer-events: none; /* prevent intercepting clicks when hidden */
    }

    .chat-window.show {
        display: flex !important;
        transform: translateY(0) scale(1);
        opacity: 1 !important;
        pointer-events: auto !important; /* allow interaction when shown */
    }

.chat-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chat-header-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.admin-avatar {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.chat-header h6 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
}

.status {
    font-size: 12px;
    opacity: 0.9;
}

.status.online:before {
    content: '●';
    color: #2ecc71;
    margin-right: 5px;
}

.chat-close {
    background: none;
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
    padding: 0;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: background 0.2s;
}

.chat-close:hover {
    background: rgba(255, 255, 255, 0.2);
}

.chat-messages {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 15px;
    background: #f8fafc;
}

.message {
    display: flex;
    align-items: flex-end;
    gap: 8px;
}

.message.user-message {
    flex-direction: row-reverse;
}

.message-content {
    max-width: 80%;
    padding: 12px 16px;
    border-radius: 18px;
    position: relative;
}

.admin-message .message-content {
    background: white;
    border: 1px solid #e2e8f0;
    border-bottom-left-radius: 4px;
}

.user-message .message-content {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-bottom-right-radius: 4px;
}

.message-content p {
    margin: 0;
    font-size: 14px;
    line-height: 1.4;
}

.message-time {
    font-size: 11px;
    opacity: 0.7;
    margin-top: 4px;
    display: block;
}

.chat-input-container {
    padding: 20px;
    background: white;
    border-top: 1px solid #e2e8f0;
}

.chat-input-wrapper {
    display: flex;
    gap: 10px;
    align-items: center;
}

.chat-input-wrapper input {
    flex: 1;
    padding: 12px 16px;
    border: 2px solid #e2e8f0;
    border-radius: 25px;
    outline: none;
    font-size: 14px;
    transition: border-color 0.2s;
}

.chat-input-wrapper input:focus {
    border-color: #667eea;
}

.chat-send-btn {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 50%;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.2s;
}

.chat-send-btn:hover {
    transform: scale(1.1);
}

.contact-info-form {
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #e2e8f0;
}

.contact-info-form .form-control {
    padding: 10px 15px;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    font-size: 14px;
}

.contact-info-form .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    outline: none;
}

.typing-indicator {
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 12px 16px;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    border-bottom-left-radius: 4px;
    max-width: 60px;
}

.typing-dot {
    width: 6px;
    height: 6px;
    background: #94a3b8;
    border-radius: 50%;
    animation: typing 1.4s infinite;
}

.typing-dot:nth-child(2) { animation-delay: 0.2s; }
.typing-dot:nth-child(3) { animation-delay: 0.4s; }

@keyframes typing {
    0%, 60%, 100% { transform: translateY(0); }
    30% { transform: translateY(-10px); }
}

/* Mobile Responsive - Enhanced for visibility */
@media (max-width: 768px) {
    .chat-widget {
        bottom: 20px !important;
        right: 20px !important;
        z-index: 999999 !important;
        position: fixed !important;
        display: block !important;
        visibility: visible !important;
    }

    .chat-toggle {
        width: 60px !important;
        height: 60px !important;
        font-size: 24px !important;
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.7) !important;
        border: 3px solid rgba(255, 255, 255, 0.5) !important;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        z-index: 999999 !important;
    }

    .chat-window {
        position: fixed !important;
        width: calc(100vw - 40px) !important;
        max-width: 350px !important;
        height: 500px !important;
        max-height: calc(100vh - 120px) !important;
        bottom: 90px !important;
        right: 20px !important;
        left: auto !important;
        transform: translateY(20px) scale(0.9) !important;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3) !important;
        z-index: 999999 !important;
        border: 2px solid rgba(102, 126, 234, 0.2) !important;
    }

    .chat-window.show {
        transform: translateY(0) scale(1) !important;
        opacity: 1 !important;
    }
}

@media (max-width: 480px) {
    .chat-widget {
        bottom: 15px !important;
        right: 15px !important;
        z-index: 999999 !important;
    }

    .chat-toggle {
        width: 55px !important;
        height: 55px !important;
        font-size: 22px !important;
        border: 3px solid rgba(255, 255, 255, 0.5) !important;
        box-shadow: 0 6px 25px rgba(102, 126, 234, 0.8) !important;
    }

    .chat-window {
        position: fixed !important;
        width: calc(100vw - 30px) !important;
        max-width: 320px !important;
        height: 450px !important;
        max-height: calc(100vh - 100px) !important;
        bottom: 80px !important;
        right: 15px !important;
        left: auto !important;
        transform: translateY(20px) scale(0.9) !important;
        z-index: 999999 !important;
    }

    .chat-window.show {
        transform: translateY(0) scale(1) !important;
        opacity: 1 !important;
    }

    .chat-messages {
        padding: 15px !important;
        font-size: 14px !important;
        max-height: calc(100% - 180px) !important;
        overflow-y: auto !important;
    }

    .chat-input-container {
        padding: 15px !important;
        background: white !important;
        border-top: 1px solid #e2e8f0 !important;
    }

    .contact-info-form .form-control {
        font-size: 16px !important; /* Prevents iOS zoom */
        padding: 12px 15px !important;
        border-radius: 10px !important;
        border: 2px solid #e2e8f0 !important;
    }

    .chat-input-wrapper input {
        font-size: 16px !important; /* Prevents iOS zoom */
        padding: 12px 15px !important;
        border-radius: 20px !important;
    }

    .chat-header {
        padding: 15px !important;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }

    .chat-header h6 {
        font-size: 15px !important;
        color: white !important;
    }

    .admin-avatar {
        width: 38px !important;
        height: 38px !important;
        font-size: 17px !important;
    }
}

@media (max-width: 360px) {
    .chat-widget {
        bottom: 10px !important;
        right: 10px !important;
    }

    .chat-toggle {
        width: 50px !important;
        height: 50px !important;
        font-size: 20px !important;
        border: 2px solid rgba(255, 255, 255, 0.5) !important;
    }

    .chat-window {
        position: fixed !important;
        width: calc(100vw - 20px) !important;
        max-width: 300px !important;
        height: 400px !important;
        max-height: calc(100vh - 80px) !important;
        bottom: 70px !important;
        right: 10px !important;
        left: auto !important;
        z-index: 999999 !important;
    }

    .chat-messages {
        padding: 12px !important;
        font-size: 13px !important;
        max-height: calc(100% - 160px) !important;
        overflow-y: auto !important;
    }

    .chat-input-container {
        padding: 12px !important;
    }

    .contact-info-form .form-control {
        font-size: 16px !important; /* Keep 16px to prevent zoom */
        padding: 10px 12px !important;
        border-radius: 8px !important;
    }

    .chat-header {
        padding: 12px !important;
    }

    .admin-avatar {
        width: 35px !important;
        height: 35px !important;
        font-size: 16px !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatToggle = document.getElementById('chatToggle');
    const chatWindow = document.getElementById('chatWindow');
    const chatClose = document.getElementById('chatClose');
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('chatInput');
    const chatMessages = document.getElementById('chatMessages');
    const startChatBtn = document.getElementById('startChatBtn');
    const contactInfoForm = document.getElementById('contactInfoForm');
    const chatNotification = document.getElementById('chatNotification');

    let chatStarted = false;
    let userName = '';
    let userEmail = '';
    let sessionId = localStorage.getItem('chat_session_id') || '';
    let lastMessageCheck = Date.now();
    let messagePollingInterval = null;
    let lastUserActivity = Date.now();
    let chatTimeoutInterval = null;
    const CHAT_TIMEOUT_MINUTES = 5;
    const CHAT_TIMEOUT_MS = CHAT_TIMEOUT_MINUTES * 60 * 1000; // 10 minutes in milliseconds

    // Toggle chat window
    chatToggle.addEventListener('click', function(e) {
        console.log('Chat toggle clicked!');
        e.preventDefault();
        e.stopPropagation();

        const isVisible = chatWindow.style.display === 'block';
        console.log('Chat window currently visible:', isVisible);

        chatWindow.style.display = isVisible ? 'none' : 'block';

        if (!isVisible) {
            console.log('Opening chat window');
            setTimeout(() => chatWindow.classList.add('show'), 10);
            chatNotification.style.display = 'none';

            // Reset timeout when user opens chat
            if (chatStarted) {
                resetChatTimeout();
            }
        } else {
            console.log('Closing chat window');
            chatWindow.classList.remove('show');
        }
    });

    // Close chat
    chatClose.addEventListener('click', function() {
        chatWindow.classList.remove('show');
        setTimeout(() => chatWindow.style.display = 'none', 300);
    });

    // Start chat
    startChatBtn.addEventListener('click', function() {
        const nameInput = document.getElementById('userName');
        const emailInput = document.getElementById('userEmail');

        if (!nameInput.value.trim() || !emailInput.value.trim()) {
            alert('{{ __("messages.please_fill_name_email") ?? "Please fill in your name and email" }}');
            return;
        }

        userName = nameInput.value.trim();
        userEmail = emailInput.value.trim();
        chatStarted = true;

        // Save user details for session persistence
        localStorage.setItem('chat_user_name', userName);
        localStorage.setItem('chat_user_email', userEmail);

        contactInfoForm.style.display = 'none';
        chatInput.style.display = 'block';
        chatInput.focus();

        // Initialize chat timeout
        resetChatTimeout();
        startChatTimeout();

        // Add welcome message with user's name
        addMessage(`Hello ${userName}! I'm here to help you with any questions about our German classes and events. What would you like to know?`, 'admin');
    });

    // Send message
    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();

        if (!chatStarted) return;

        const message = chatInput.value.trim();
        if (!message) return;

        // Reset chat timeout on user activity
        resetChatTimeout();

        // Add user message
        addMessage(message, 'user');
        chatInput.value = '';

        // Show typing indicator
        showTypingIndicator();

        // Send to admin (via email or database)
        sendMessageToAdmin(message, userName, userEmail);

        // Start polling for new messages if not already started
        if (!messagePollingInterval) {
            startMessagePolling();
        }

        // Start timeout monitoring
        if (!chatTimeoutInterval) {
            startChatTimeout();
        }
    });

    function addMessage(text, sender, customTime = null, messageId = null) {
        // Check if message already exists to prevent duplicates
        if (messageId && chatMessages.querySelector(`[data-message-id="${messageId}"]`)) {
            console.log('Message already exists, skipping:', messageId);
            return;
        }

        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${sender}-message`;
        if (messageId) {
            messageDiv.setAttribute('data-message-id', messageId);
        }

        const time = customTime || new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

        messageDiv.innerHTML = `
            <div class="message-content">
                <p>${text}</p>
                <span class="message-time">${time}</span>
            </div>
        `;

        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        console.log('Added message:', {text, sender, time, messageId});
    }    function showTypingIndicator() {
        const typingDiv = document.createElement('div');
        typingDiv.className = 'message admin-message typing-message';
        typingDiv.innerHTML = `
            <div class="typing-indicator">
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
            </div>
        `;

        chatMessages.appendChild(typingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function hideTypingIndicator() {
        const typingMessage = document.querySelector('.typing-message');
        if (typingMessage) {
            typingMessage.remove();
        }
    }

    function endChatSession() {
        console.log('Ending chat session due to inactivity');

        // Clear polling intervals
        if (messagePollingInterval) {
            clearInterval(messagePollingInterval);
            messagePollingInterval = null;
        }

        if (chatTimeoutInterval) {
            clearInterval(chatTimeoutInterval);
            chatTimeoutInterval = null;
        }

        // Add timeout message
        addMessage(`This chat session has ended due to inactivity (${CHAT_TIMEOUT_MINUTES} minutes). Feel free to start a new conversation anytime!`, 'admin');

        // Reset chat state
        chatStarted = false;
        sessionId = '';
        userName = '';
        userEmail = '';

        // Clear localStorage
        localStorage.removeItem('chat_session_id');
        localStorage.removeItem('chat_user_name');
        localStorage.removeItem('chat_user_email');

        // Show contact form again
        setTimeout(() => {
            contactInfoForm.style.display = 'block';
            chatInput.style.display = 'none';

            // Clear previous contact info
            document.getElementById('userName').value = '';
            document.getElementById('userEmail').value = '';
        }, 2000);
    }

    function startChatTimeout() {
        // Clear existing timeout
        if (chatTimeoutInterval) {
            clearInterval(chatTimeoutInterval);
        }

        chatTimeoutInterval = setInterval(() => {
            const timeSinceLastActivity = Date.now() - lastUserActivity;

            if (timeSinceLastActivity >= CHAT_TIMEOUT_MS) {
                endChatSession();
            }
        }, 30000); // Check every 30 seconds
    }

    function resetChatTimeout() {
        lastUserActivity = Date.now();
        console.log('User activity detected, resetting timeout');
    }

    function sendMessageToAdmin(message, name, email) {
        console.log('Attempting to send message:', {message, name, email, page: window.location.href, session_id: sessionId});

        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        console.log('CSRF Token:', csrfToken);

        if (!csrfToken) {
            console.error('CSRF token not found!');
            hideTypingIndicator();
            addMessage('Connection error. Please refresh the page and try again.', 'admin');
            return;
        }

        fetch('/chat/send-message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                message: message,
                name: name,
                email: email,
                page: window.location.href,
                session_id: sessionId
            })
        })
        .then(response => {
            console.log('Response status:', response.status);

            if (!response.ok) {
                return response.text().then(text => {
                    console.error('Error response text:', text);
                    throw new Error(`HTTP error! status: ${response.status}, body: ${text}`);
                });
            }
            return response.json();
        })
        .then(data => {
            console.log('Success response:', data);
            hideTypingIndicator();

            if (data.success) {
                if (data.session_id) {
                    sessionId = data.session_id;
                    localStorage.setItem('chat_session_id', sessionId);
                }

                // Start polling for admin replies
                if (!messagePollingInterval) {
                    startMessagePolling();
                }

                // Add confirmation message
                setTimeout(() => {
                    addMessage('Message sent! An admin will respond shortly.', 'admin');
                }, 500);
            } else {
                addMessage('Message could not be sent. Please try again.', 'admin');
            }
        })
        .catch(error => {
            console.error('Detailed error sending message:', error);
            hideTypingIndicator();

            // More specific error messages
            if (error.message.includes('419') || error.message.includes('CSRF')) {
                addMessage('Session expired. Please refresh the page and try again.', 'admin');
            } else if (error.message.includes('500')) {
                addMessage('Server error. Your message was saved but there was a technical issue.', 'admin');
            } else {
                addMessage('Sorry, there was an error sending your message. Please try again.', 'admin');
            }
        });
    }

    function startMessagePolling() {
        if (!sessionId) {
            console.log('No session ID, cannot start polling');
            return;
        }

        // Clear any existing polling interval
        if (messagePollingInterval) {
            clearInterval(messagePollingInterval);
        }

        console.log('Starting message polling for session:', sessionId);

        // Initial check
        setTimeout(() => {
            checkForNewMessages();
        }, 500);

        // Set up regular polling
        messagePollingInterval = setInterval(() => {
            checkForNewMessages();
        }, 5000); // Check every 5 seconds
    }

    function checkForNewMessages() {
        if (!sessionId || !chatStarted) {
            console.log('No session ID or chat not started, stopping polling');
            if (messagePollingInterval) {
                clearInterval(messagePollingInterval);
                messagePollingInterval = null;
            }
            return;
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (!csrfToken) {
            console.error('CSRF token not found for polling - stopping polling');
            if (messagePollingInterval) {
                clearInterval(messagePollingInterval);
                messagePollingInterval = null;
            }
            return;
        }

        fetch(`/chat/get-messages?session_id=${sessionId}`, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Polling response:', data);
            if (data.success && data.messages && Array.isArray(data.messages)) {
                // Get current message count to detect new messages
                const currentMessages = chatMessages.querySelectorAll('.message').length;

                // Check if we have new admin messages
                const newAdminMessages = data.messages.filter(msg =>
                    msg.sender_type === 'admin' &&
                    !chatMessages.querySelector(`[data-message-id="${msg.id}"]`)
                );

                newAdminMessages.forEach(msg => {
                    console.log('New admin message found:', msg);
                    // Show typing indicator briefly for realism
                    showTypingIndicator();
                    setTimeout(() => {
                        hideTypingIndicator();
                        addMessage(msg.message, 'admin', msg.created_at, msg.id);

                        // Show notification if chat is closed
                        if (chatWindow.style.display === 'none') {
                            chatNotification.style.display = 'block';
                            chatNotification.textContent = '1';
                        }
                    }, 800);
                });

                lastMessageCheck = Date.now();
            }
        })
        .catch(error => {
            console.error('Error checking messages:', error);
        });
    }

    // Resume existing conversation if session exists
    if (sessionId && localStorage.getItem('chat_user_name')) {
        userName = localStorage.getItem('chat_user_name');
        userEmail = localStorage.getItem('chat_user_email');
        chatStarted = true;
        contactInfoForm.style.display = 'none';
        chatInput.style.display = 'block';

        // Initialize timeout for resumed session
        resetChatTimeout();
        startChatTimeout();

        // Load previous messages
        loadChatHistory();
        startMessagePolling();
    }

    function loadChatHistory() {
        if (!sessionId) return;

        console.log('Loading chat history for session:', sessionId);

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (!csrfToken) {
            console.error('CSRF token not found for chat history');
            return;
        }

        fetch(`/chat/get-messages?session_id=${sessionId}`, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Chat history response:', data);
            if (data.success && data.messages && Array.isArray(data.messages)) {
                // Clear existing messages except the initial welcome message
                const messagesToRemove = chatMessages.querySelectorAll('.message:not(:first-child)');
                messagesToRemove.forEach(msg => msg.remove());

                // Add historical messages in order
                data.messages.forEach(msg => {
                    addMessage(msg.message, msg.sender_type, msg.created_at, msg.id);
                });

                console.log(`Loaded ${data.messages.length} historical messages`);
            }
        })
        .catch(error => {
            console.error('Error loading chat history:', error);
        });
    }

    // Add typing detection for user activity
    chatInput.addEventListener('input', function() {
        if (chatStarted) {
            resetChatTimeout();
        }
    });

    // Add click detection for user activity
    chatWindow.addEventListener('click', function() {
        if (chatStarted) {
            resetChatTimeout();
        }
    });

    // Show notification periodically
    setTimeout(() => {
        if (chatWindow.style.display !== 'block') {
            chatNotification.style.display = 'block';
        }
    }, 10000); // Show after 10 seconds
});
</script>
