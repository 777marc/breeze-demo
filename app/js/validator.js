var personAttributes = ['person_id','first_name','last_name','email_address','group_id','state'];
var groupAttributes = ['group_id','group_name'];

function getPersonSchema() {
    return personAttributes;
}

function getGroupSchema() {
    return groupAttributes;
}

function isPeopleUpload(attribute) {
    return personAttributes.includes(attribute);
}

function isGroupUpload(attribute) {
    return groupAttributes.includes(attribute);
}

