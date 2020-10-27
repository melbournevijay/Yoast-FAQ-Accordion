if ( 'querySelectorAll' in document) {

	(function() {
	const headings = document.querySelectorAll('.wp-block-yoast-faq-block .schema-faq-question')

	Array.prototype.forEach.call(headings, heading => {
	  heading.innerHTML = `
		<button aria-expanded="false">${heading.textContent} <svg aria-hidden="true" focusable="false" viewBox="0 0 10 10"><rect class="vert" height="8" width="2" y="1" x="4"/><rect height="2" width="8" y="4" x="1"/> </svg></button>
	  `;
	  const getContent = (elem) => {
		let elems = [];
		while (elem.nextElementSibling && elem.nextElementSibling.className === 'schema-faq-answer') {
		  elems.push(elem.nextElementSibling);
		  elem = elem.nextElementSibling;
		}
		elems.forEach((node) => {
		  node.parentNode.removeChild(node);
		})
		return elems;
	  }
	  let contents = getContent(heading);
	  let wrapper = document.createElement('div');
	  wrapper.hidden = true;
	  contents.forEach(node => {
		wrapper.appendChild(node);
	  })
	  heading.parentNode.insertBefore(wrapper, heading.nextElementSibling);
	  let btn = heading.querySelector('button');
	  btn.onclick = () => {
		let expanded = btn.getAttribute('aria-expanded') === 'true' || false;
		btn.setAttribute('aria-expanded', !expanded);
		wrapper.hidden = expanded;   
	  }
	})
  })()
  }