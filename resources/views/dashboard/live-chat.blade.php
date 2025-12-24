<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Chat Support | Real-Time Assistance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .livechat-wrapper {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        .livechat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f0fdf9 100%);
            border-radius: 28px;
            padding: 55px 60px;
            box-shadow: 0 22px 50px rgba(16, 185, 129, 0.2);
            animation: fadeSlide 0.8s ease-out;
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(16, 185, 129, 0.25);
        }

        .livechat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 8px;
            width: 100%;
            background: linear-gradient(90deg, #10b981, #34d399, #6ee7b7);
        }

        .livechat-card::after {
            content: '';
            position: absolute;
            top: -30%;
            right: -30%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.12) 0%, transparent 70%);
            z-index: 0;
        }

        .livechat-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .livechat-icon {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            width: 90px;
            height: 90px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4);
            animation: chatPulse 2s infinite;
        }

        .livechat-title {
            flex: 1;
        }

        .livechat-title h1 {
            font-size: 2.8rem;
            font-weight: 900;
            color: #065f46;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .livechat-title p {
            color: #047857;
            font-size: 1.2rem;
            margin: 8px 0 0;
            font-weight: 500;
        }

        .availability-banner {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            padding: 25px 30px;
            border-radius: 18px;
            margin: 35px 0;
            border: 2px solid #a7f3d0;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.15);
        }

        .availability-icon {
            font-size: 2.5rem;
            color: #10b981;
            animation: bounce 2s infinite;
        }

        .availability-text {
            flex: 1;
        }

        .availability-text h4 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #065f46;
            margin-bottom: 8px;
        }

        .availability-text p {
            color: #047857;
            font-size: 16px;
            line-height: 1.6;
            margin: 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin: 40px 0;
            position: relative;
            z-index: 1;
        }

        .feature-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            border: 2px solid #d1fae5;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: #10b981;
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.15);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            color: #10b981;
            font-size: 1.8rem;
        }

        .feature-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #065f46;
            margin-bottom: 15px;
        }

        .feature-desc {
            color: #047857;
            font-size: 15.5px;
            line-height: 1.6;
            margin: 0;
        }

        .chat-preview {
            background: white;
            border-radius: 20px;
            padding: 0;
            margin: 50px 0;
            border: 2px solid #d1fae5;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .chat-header {
            background: linear-gradient(135deg, #10b981, #059669);
            padding: 25px 30px;
            color: white;
        }

        .chat-header h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chat-messages {
            padding: 30px;
            min-height: 300px;
            max-height: 400px;
            overflow-y: auto;
            background: #f9fafb;
        }

        .message {
            margin-bottom: 25px;
            max-width: 75%;
            animation: messageSlide 0.5s ease-out;
        }

        .message-agent {
            margin-right: auto;
        }

        .message-user {
            margin-left: auto;
            text-align: right;
        }

        .message-bubble {
            padding: 18px 22px;
            border-radius: 20px;
            font-size: 15.5px;
            line-height: 1.6;
            position: relative;
            display: inline-block;
        }

        .message-agent .message-bubble {
            background: white;
            border: 1px solid #e5e7eb;
            color: #374151;
            border-top-left-radius: 5px;
        }

        .message-user .message-bubble {
            background: linear-gradient(135deg, #10b981, #34d399);
            color: white;
            border-bottom-right-radius: 5px;
        }

        .message-time {
            font-size: 12px;
            color: #9ca3af;
            margin-top: 8px;
            display: block;
        }

        .chat-input-area {
            padding: 25px 30px;
            border-top: 2px solid #e5e7eb;
            background: white;
            display: flex;
            gap: 15px;
        }

        .chat-input {
            flex: 1;
            padding: 15px 20px;
            border: 2px solid #d1fae5;
            border-radius: 14px;
            font-size: 15.5px;
            transition: all 0.3s ease;
        }

        .chat-input:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .send-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .send-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        }

        .agents-showcase {
            background: linear-gradient(135deg, #f0fdf9, #ecfdf5);
            border-radius: 20px;
            padding: 35px 40px;
            margin: 50px 0;
            position: relative;
            z-index: 1;
            border: 2px solid #a7f3d0;
        }

        .agents-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #065f46;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .agent-cards {
            display: flex;
            gap: 25px;
            overflow-x: auto;
            padding: 10px 5px;
        }

        .agent-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            min-width: 220px;
            text-align: center;
            border: 2px solid #d1fae5;
            transition: all 0.3s ease;
        }

        .agent-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(16, 185, 129, 0.15);
        }

        .agent-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #34d399);
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: 600;
        }

        .agent-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #065f46;
            margin-bottom: 8px;
        }

        .agent-specialty {
            font-size: 14px;
            color: #047857;
            margin-bottom: 15px;
        }

        .agent-rating {
            color: #f59e0b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .response-stats {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 25px;
            margin: 40px 0;
            position: relative;
            z-index: 1;
        }

        .stat-item {
            text-align: center;
            padding: 25px;
            min-width: 180px;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: #10b981;
            margin-bottom: 5px;
            line-height: 1;
        }

        .stat-label {
            font-size: 1.1rem;
            color: #065f46;
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
            margin: 50px 0 30px;
            position: relative;
            z-index: 1;
        }

        .start-chat-btn {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 20px 45px;
            border-radius: 18px;
            text-decoration: none;
            font-weight: 800;
            font-size: 1.4rem;
            transition: all 0.3s ease;
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
            min-width: 300px;
            justify-content: center;
        }

        .start-chat-btn:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 25px 50px rgba(16, 185, 129, 0.6);
            color: white;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 35px;
            border-radius: 14px;
            font-weight: 600;
            background: #f8f9fa;
            border: 2px solid #e5e7eb;
            color: #4b5563;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            transform: translateX(-4px);
            background: #f3f4f6;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            color: #1f2937;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes chatPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
            }
            70% {
                box-shadow: 0 0 0 20px rgba(16, 185, 129, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes messageSlide {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes typing {
            0% { opacity: 0.3; }
            50% { opacity: 1; }
            100% { opacity: 0.3; }
        }

        @media (max-width: 768px) {
            .livechat-card {
                padding: 35px 25px;
            }
            
            .livechat-header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .livechat-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
            
            .livechat-title h1 {
                font-size: 2.2rem;
            }
            
            .availability-banner {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .response-stats {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
            
            .stat-item {
                min-width: 100%;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }
            
            .start-chat-btn, .back-btn {
                width: 100%;
                justify-content: center;
                min-width: auto;
            }
            
            .agent-cards {
                flex-direction: column;
            }
        }

        .typing-indicator {
            display: flex;
            gap: 5px;
            padding: 15px 20px;
            background: white;
            border-radius: 20px;
            border: 1px solid #e5e7eb;
            width: fit-content;
            margin-bottom: 25px;
        }

        .typing-dot {
            width: 8px;
            height: 8px;
            background: #9ca3af;
            border-radius: 50%;
            animation: typing 1.4s infinite;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }
    </style>
</head>
<body>
    @extends('dashboard.adminrole')
    @section('content')
    <div class="container py-5">
        <div class="livechat-wrapper">
            <div class="livechat-card">
                <div class="livechat-header">
                    <div class="livechat-icon">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <div class="livechat-title">
                        <h1>Live Chat Support</h1>
                        <p>Instant Connection • Expert Assistance • Real-Time Solutions</p>
                    </div>
                </div>

                <div class="availability-banner">
                    <div class="availability-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="availability-text">
                        <h4>⚡ Immediate Support Available</h4>
                        <p>Connect with our expert support agents instantly. Average response time under <strong>2 minutes</strong>, available 24/7 including weekends and holidays.</p>
                    </div>
                </div>

                <div class="response-stats">
                    <div class="stat-item">
                        <div class="stat-number">< 2 min</div>
                        <div class="stat-label">Avg. Response Time</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Availability</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfaction Rate</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Expert Agents</div>
                    </div>
                </div>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4 class="feature-title">Instant Connection</h4>
                        <p class="feature-desc">No waiting in queues. Get connected to the right specialist within seconds using our intelligent routing system.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="feature-title">Secure & Private</h4>
                        <p class="feature-desc">End-to-end encrypted conversations ensuring your data and privacy are completely protected.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>
                        <h4 class="feature-title">File Sharing</h4>
                        <p class="feature-desc">Share screenshots, documents, and files directly in chat for faster problem resolution.</p>
                    </div>
                </div>

                <div class="chat-preview">
                    <div class="chat-header">
                        <h3><i class="fas fa-headset"></i> Live Chat Preview</h3>
                    </div>
                    <div class="chat-messages" id="chatPreview">
                        <div class="message message-agent">
                            <div class="message-bubble">
                                Hi! I'm Alex from support. How can I help you today?
                            </div>
                            <span class="message-time">2:30 PM • Support Agent</span>
                        </div>
                        
                        <div class="message message-user">
                            <div class="message-bubble">
                                I'm having trouble accessing the reporting dashboard. Getting a 403 error.
                            </div>
                            <span class="message-time">2:31 PM • You</span>
                        </div>
                        
                        <div class="message message-agent">
                            <div class="message-bubble">
                                I can help with that. Can you tell me which browser you're using and if you've cleared your cache recently?
                            </div>
                            <span class="message-time">2:31 PM • Support Agent</span>
                        </div>
                        
                        <div class="typing-indicator" id="typingIndicator">
                            <div class="typing-dot"></div>
                            <div class="typing-dot"></div>
                            <div class="typing-dot"></div>
                        </div>
                    </div>
                    <div class="chat-input-area">
                        <input type="text" class="chat-input" placeholder="Type your message here..." id="chatInput">
                        <button class="send-btn" onclick="sendMessage()">
                            <i class="fas fa-paper-plane"></i> Send
                        </button>
                    </div>
                </div>

                <div class="agents-showcase">
                    <h3 class="agents-title">
                        <i class="fas fa-users"></i>
                        Meet Our Support Team
                    </h3>
                    <div class="agent-cards">
                        <div class="agent-card">
                            <div class="agent-avatar">AJ</div>
                            <div class="agent-name">Alex Johnson</div>
                            <div class="agent-specialty">Technical Specialist</div>
                            <div class="agent-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div style="font-size: 14px; color: #6b7280;">4.9/5 rating</div>
                        </div>
                        
                        <div class="agent-card">
                            <div class="agent-avatar">MS</div>
                            <div class="agent-name">Maria Smith</div>
                            <div class="agent-specialty">Billing & Accounts</div>
                            <div class="agent-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div style="font-size: 14px; color: #6b7280;">4.8/5 rating</div>
                        </div>
                        
                        <div class="agent-card">
                            <div class="agent-avatar">DR</div>
                            <div class="agent-name">David Rodriguez</div>
                            <div class="agent-specialty">System Administration</div>
                            <div class="agent-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div style="font-size: 14px; color: #6b7280;">5.0/5 rating</div>
                        </div>
                        
                        <div class="agent-card">
                            <div class="agent-avatar">SK</div>
                            <div class="agent-name">Sarah Kim</div>
                            <div class="agent-specialty">Security & Compliance</div>
                            <div class="agent-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div style="font-size: 14px; color: #6b7280;">4.9/5 rating</div>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="#" class="start-chat-btn" onclick="startLiveChat()">
                        <i class="fas fa-comments"></i> Start Live Chat Now
                    </a>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary back-btn">
                        <i class="fas fa-arrow-left"></i> Return to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        let messageCount = 0;
        
        function startLiveChat() {
            const confirmStart = confirm('Start live chat with our support team? You\'ll be connected with an available agent immediately.');
            
            if (confirmStart) {
                
                alert('Connecting you with a support agent... Please wait a moment.');
                
                
                setTimeout(() => {
                    alert('Connected! A support agent has joined the chat.');
                    
                }, 1500);
            }
        }
        
        function sendMessage() {
            const input = document.getElementById('chatInput');
            const message = input.value.trim();
            const chatPreview = document.getElementById('chatPreview');
            const typingIndicator = document.getElementById('typingIndicator');
            
            if (message) {
                
                const userMessage = document.createElement('div');
                userMessage.className = 'message message-user';
                userMessage.innerHTML = `
                    <div class="message-bubble">${message}</div>
                    <span class="message-time">${getCurrentTime()} • You</span>
                `;
                chatPreview.insertBefore(userMessage, typingIndicator);
                
            
                input.value = '';
                
                
                typingIndicator.style.display = 'flex';
                
                
                chatPreview.scrollTop = chatPreview.scrollHeight;
                
                
                setTimeout(() => {
                    typingIndicator.style.display = 'none';
                    
                    const agentMessages = [
                        "Thanks for sharing that information. I'll look into this right away.",
                        "I understand the issue. Let me check your account settings.",
                        "I can help with that. Have you tried clearing your browser cache?",
                        "That's a common issue. Let me guide you through the solution.",
                        "I'll need a bit more information to help you better. Can you tell me..."
                    ];
                    
                    const randomResponse = agentMessages[Math.floor(Math.random() * agentMessages.length)];
                    
                    const agentMessage = document.createElement('div');
                    agentMessage.className = 'message message-agent';
                    agentMessage.innerHTML = `
                        <div class="message-bubble">${randomResponse}</div>
                        <span class="message-time">${getCurrentTime()} • Support Agent</span>
                    `;
                    chatPreview.insertBefore(agentMessage, typingIndicator);
                    
                    
                    chatPreview.scrollTop = chatPreview.scrollHeight;
                    
                    
                    setTimeout(() => {
                        typingIndicator.style.display = 'flex';
                    }, 2000);
                    
                }, 1500);
            }
        }
        
        function getCurrentTime() {
            const now = new Date();
            return `${now.getHours()}:${now.getMinutes().toString().padStart(2, '0')}`;
        }
        
        
        document.getElementById('chatInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
        
       
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
     
        window.addEventListener('load', () => {
            const chatPreview = document.getElementById('chatPreview');
            chatPreview.scrollTop = chatPreview.scrollHeight;
        });
    </script>
    @endsection
</body>
</html>