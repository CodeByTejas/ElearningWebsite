// Get chatbot elements
const chatbot = document.getElementById('chatbot');
const conversation = document.getElementById('conversation');
const inputForm = document.getElementById('input-form');
const inputField = document.getElementById('input-field');

// Add event listener to input form
inputForm.addEventListener('submit', function(event) {
  // Prevent form submission
  event.preventDefault();

  // Get user input
  const input = inputField.value;

  // Clear input field
  inputField.value = '';
  const currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: "2-digit" });

  // Add user input to conversation
  let message = document.createElement('div');
  message.classList.add('chatbot-message', 'user-message');
  message.innerHTML = `<p class="chatbot-text" sentTime="${currentTime}">${input}</p>`;
  conversation.appendChild(message);

  // Generate chatbot response
  const response = generateResponse(input);

  // Add chatbot response to conversation
  message = document.createElement('div');
  message.classList.add('chatbot-message','chatbot');
  message.innerHTML = `<p class="chatbot-text" sentTime="${currentTime}">${response}</p>`;
  conversation.appendChild(message);
  message.scrollIntoView({behavior: "smooth"});
});

// Generate chatbot response function
function generateResponse(input) {
    // Add chatbot logic here
    const query = input.toLowerCase();

    // Check for common e-learning questions and provide relevant responses
    if (query.includes("course")) {
      return "We offer a wide range of courses on various topics. You can browse our course catalog on our website to find the perfect fit for you.";
    } 
    else if (query.includes("enrollment")) {
      return "Enrollment is easy! Just visit our website and follow the instructions to sign up for your desired course.";
    }
    else if (query.includes("hey")) {
      return "Welcome Variableverse learning platform!!! how may I help you ?";
    }
    else if (query.includes("course list")) {
      return "We have wide variety of courses like web development, UI UX desgning, SEO , graphic designing, digital marketing";
    }
     else if (query.includes("certificate")) {
      return "Yes, we offer certificates of completion for all our courses. Once you finish the course requirements, you can download your certificate from your account dashboard.";
    }
     else if (query.includes("payment")) {
      return "We accept various payment methods, including credit/debit cards, PayPal, and bank transfers. You can select your preferred payment option during the enrollment process.";
    }
     else if (query.includes("instructor")) {
      return "All our courses are taught by expert instructors with extensive knowledge and experience in their respective fields.";
    }
     else if (query.includes("refund")) {
      return "We have a flexible refund policy that allows you to request a refund within 30 days of enrollment if you are not satisfied with the course. Please check our website for more details.";
    }
    
     else {
      // If the input does not match any known e-learning questions, provide a generic response
      return "I'm sorry, I'm not sure I understand your question. Could you please rephrase it or try asking something else related to e-learning?";
    }
  }
  
  
  
