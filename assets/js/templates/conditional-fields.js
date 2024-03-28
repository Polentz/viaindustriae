// CONDITIONAL FIELDS
// Show/hide fields depending on other fields
// https://getkirby.com/docs/guide/blueprints/fields#conditional-fields
const checkboxElements = document.querySelectorAll('input[type="checkbox"], select[type="select"]');
const conditionalFieldElements = document.querySelectorAll('.field[data-when]');

function updateRequiredField(fieldElement) {
  const inputElement = fieldElement.querySelector('input, select, textarea, radio');
  if (fieldElement.hidden === true && inputElement.getAttribute('required') !== null) {
    inputElement.dataset.conditionalRequired = 'true';
    inputElement.removeAttribute('required');
  } else if (inputElement.dataset.conditionalRequired === 'true') {
    inputElement.setAttribute('required', '');
  }
}

// ok for checkbox
// function updateConditionalFields(name, value) {
//   conditionalFieldElements.forEach((conditionalFieldElement) => {
//     const whenObject = JSON.parse(conditionalFieldElement.dataset.when);
//     Object.keys(whenObject).forEach((key) => {
//       if (name === key.toLowerCase()) {
//         if (whenObject[key] === value) {
//           conditionalFieldElement.removeAttribute('hidden');
//         } else {
//           conditionalFieldElement.setAttribute('hidden', '');
//         }
//         updateRequiredField(conditionalFieldElement);
//       }
//     });
//   });
// }

// checkboxElements.forEach((checkboxElement) => {
//   checkboxElement.addEventListener('change', () => {
//     updateConditionalFields(checkboxElement.name, checkboxElement.checked);
//   });
//   updateConditionalFields(checkboxElement.name, checkboxElement.checked);
// });


// ok for select
// function updateConditionalFields(elementValue) {
//   conditionalFieldElements.forEach((conditionalFieldElement) => {
//     const whenObject = JSON.parse(conditionalFieldElement.dataset.when);
//     Object.values(whenObject).forEach((value) => {
//       if (value === elementValue) {
//         conditionalFieldElement.removeAttribute('hidden');
//       } else {
//         conditionalFieldElement.setAttribute('hidden', '');
//       }
//       updateRequiredField(conditionalFieldElement);
//     });
//   });
// }

// checkboxElements.forEach((checkboxElement) => {
//   checkboxElement.addEventListener('change', () => {
//     updateConditionalFields(checkboxElement.value);
//   });
//   updateConditionalFields(checkboxElement.value);
// });

const updateConditionalFields = (elementValue) => {
  conditionalFieldElements.forEach(conditionalFieldElement => {
    const whenObject = JSON.parse(conditionalFieldElement.dataset.when);
    Object.values(whenObject).forEach(value => {
      if (value === elementValue) {
        conditionalFieldElement.removeAttribute("hidden");
      } else {
        conditionalFieldElement.setAttribute("hidden", "");
      };
      updateRequiredField(conditionalFieldElement);
    });
  });
}

checkboxElements.forEach((checkboxElement) => {
  checkboxElement.addEventListener("change", () => {
    updateConditionalFields(checkboxElement.value);
  });
  updateConditionalFields(checkboxElement.value);
});