/**
 * Service Form Handler
 * Handles AJAX form submissions for all service inquiry forms
 */

class ServiceFormHandler {
    constructor(formId, options = {}) {
        this.form = document.getElementById(formId);
        this.options = {
            submitUrl: '/services/inquiry',
            successMessage: 'Thank you for your service inquiry! We will review your requirements and get back to you within 24 hours.',
            errorMessage: 'Sorry, there was an error submitting your inquiry. Please try again or contact us directly.',
            ...options
        };
        
        if (this.form) {
            this.init();
        }
    }
    
    init() {
        this.submitBtn = this.form.querySelector('#submit-btn');
        this.submitText = this.form.querySelector('#submit-text');
        this.loadingText = this.form.querySelector('#loading-text');
        this.formMessages = this.form.querySelector('#form-messages');
        this.successMessage = this.form.querySelector('#success-message');
        this.errorMessage = this.form.querySelector('#error-message');
        this.successText = this.form.querySelector('#success-text');
        this.errorText = this.form.querySelector('#error-text');
        
        this.form.addEventListener('submit', this.handleSubmit.bind(this));
    }
    
    async handleSubmit(e) {
        e.preventDefault();
        
        this.showLoading();
        this.hideMessages();
        
        try {
            const formData = new FormData(this.form);
            
            const response = await fetch(this.options.submitUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.showSuccess(data.message || this.options.successMessage);
                this.form.reset();
            } else {
                throw new Error(data.message || this.options.errorMessage);
            }
            
        } catch (error) {
            this.showError(error.message || this.options.errorMessage);
        } finally {
            this.hideLoading();
        }
    }
    
    showLoading() {
        if (this.submitBtn) {
            this.submitBtn.disabled = true;
        }
        if (this.submitText) {
            this.submitText.classList.add('hidden');
        }
        if (this.loadingText) {
            this.loadingText.classList.remove('hidden');
        }
    }
    
    hideLoading() {
        if (this.submitBtn) {
            this.submitBtn.disabled = false;
        }
        if (this.submitText) {
            this.submitText.classList.remove('hidden');
        }
        if (this.loadingText) {
            this.loadingText.classList.add('hidden');
        }
    }
    
    hideMessages() {
        if (this.formMessages) {
            this.formMessages.classList.add('hidden');
        }
        if (this.successMessage) {
            this.successMessage.classList.add('hidden');
        }
        if (this.errorMessage) {
            this.errorMessage.classList.add('hidden');
        }
    }
    
    showSuccess(message) {
        if (this.successText) {
            this.successText.textContent = message;
        }
        if (this.successMessage) {
            this.successMessage.classList.remove('hidden');
        }
        if (this.formMessages) {
            this.formMessages.classList.remove('hidden');
        }
    }
    
    showError(message) {
        if (this.errorText) {
            this.errorText.textContent = message;
        }
        if (this.errorMessage) {
            this.errorMessage.classList.remove('hidden');
        }
        if (this.formMessages) {
            this.formMessages.classList.remove('hidden');
        }
    }
}

// Auto-initialize service forms when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all service forms
    const serviceForms = [
        'business-consultancy-form',
        'accounting-form',
        'tax-advisory-form',
        'financial-planning-form',
        'business-registration-form',
        'audit-compliance-form',
        'training-form',
        'career-development-form',
        'feasibility-studies-form',
        'data-analytics-form',
        'market-research-form'
    ];
    
    serviceForms.forEach(formId => {
        new ServiceFormHandler(formId);
    });
});

// Export for manual initialization if needed
window.ServiceFormHandler = ServiceFormHandler;
