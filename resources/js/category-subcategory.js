document.addEventListener('DOMContentLoaded', () => {
    const categoryInput = document.querySelector('input[name="category"]');
    const subcategoryInput = document.querySelector('input[name="subcategory"]');
    
    if (!categoryInput || !subcategoryInput) return;
    
    // Get categories data from a data attribute on the form or body
    const categoriesData = document.querySelector('[data-categories]')?.dataset.categories;
    if (!categoriesData) return;
    
    const categories = JSON.parse(categoriesData);
    const subcategoryContainer = subcategoryInput.closest('[x-data]');
    
    // Watch for category input changes
    const observer = new MutationObserver(() => {
        const categoryValue = categoryInput.value;
        
        if (categoryValue && categories[categoryValue]) {
            // Update subcategory options
            const subcategoryDropdown = subcategoryContainer.querySelector('.absolute.z-50');
            if (subcategoryDropdown) {
                const placeholder = subcategoryDropdown.querySelector('div:first-child');
                subcategoryDropdown.innerHTML = '';
                subcategoryDropdown.appendChild(placeholder.cloneNode(true));
                
                Object.entries(categories[categoryValue].subcategories).forEach(([key, label]) => {
                    const option = document.createElement('div');
                    option.className = 'px-4 py-3 hover:bg-primary/10 cursor-pointer transition-colors font-body text-gray-700 border-b border-gray-100 last:border-b-0';
                    option.textContent = label;
                    option.setAttribute('x-data', '');
                    option.setAttribute('@click', `selected = '${key}'; selectedLabel = '${label}'; open = false`);
                    subcategoryDropdown.appendChild(option);
                });
            }
        }
    });
    
    observer.observe(categoryInput, { attributes: true, attributeFilter: ['value'] });
});
