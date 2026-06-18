This project is based on the topic-Online Course Reservation that follows an academic approach to allow students to enroll & learn online,thus reducing the traditional form-filling system that costs both energy & time.New updates will be included further in the project.

**Contact: checkoutprakhar@gmail.com** for any complaints/issues
___

## 🚀 Getting Started

Clone the repository and install dependencies:

```bash
# Clone the repo
git clone https://github.com/Prakhar0123/ELARN.git

# Navigate into the project folder
cd ELARN

# Install dependencies
npm install

# Start the development server
npm start
```
## Google Apps Script Integration:

I used Google Apps Script to automate tasks in ELARN’s Google Sheets' & Google Forms' backend. Here are the script snippets:

**1. Auto-Delete enrollments older than 3 days** - Add this code in the Apps Script provided in Google Sheets 
```javascript
function deleteOldRows() {
  const sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName("Your Sheet Name (bottom left)");
  const dateColumn = 1;
  const today = new Date();
  const data = sheet.getDataRange().getValues();
  for (let i = data.length - 1; i >= 1; i--) {
    let cellDate = new Date(data[i][dateColumn - 1]);
    if (!isNaN(cellDate) && (today - cellDate) / (1000 * 60 * 60 * 24) > 3) {
      sheet.deleteRow(i + 1);
    }
  }
}
```
**2. Auto-Sort new Courses** - Add this code in the Apps Script provided in Google Form creation page
```javascript
function autoSortCheckbox() {
  try {
    var form = FormApp.openById("Your form ID from the URL located between d/.../edit");
    var items = form.getItems(FormApp.ItemType.CHECKBOX);
    items.forEach(function(item) {
      var checkboxItem = item.asCheckboxItem();
      var choices = checkboxItem.getChoices();
      var choiceValues = choices.map(function(choice) {
        return choice.getValue();
      });
      choiceValues.sort(function(a, b) {
        return a.toLowerCase().localeCompare(b.toLowerCase());
      });
      var newChoices = choiceValues.map(function(value) {
        return checkboxItem.createChoice(value);
      });
      checkboxItem.setChoices(newChoices);
    });
    Logger.log("Checkbox options sorted successfully.");
  } catch (err) {
    Logger.log("Error: " + err.message);
  }
}
```
