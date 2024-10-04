import { faker } from "@faker-js/faker";

describe("Orders test", () => {
	before(() =>cy.login());
	
	it("page orders", () => {
		cy.get(':nth-child(6) > .inline-flex').click(); cy.wait(2000);
		cancelCreate(); cy.wait(1000);
		confirmCreate(); cy.wait(1000);
		// update(); cy.wait(1000);
		// confirmEliminar(); cy.wait(1000);
		search();
	})
});

function cancelCreate() {
	cy.get('.lg\\:w-3\\/5 > :nth-child(1) > .flex > .inline-flex').click();
	cy.get('.justify-between > .flex > .bg-white').click();
}

function confirmCreate() {
	cy.get('.lg\\:w-3\\/5 > :nth-child(1) > .flex > .inline-flex').click();

	//order1
	for(let order = 0; order < 10; order++){
		cy.get('.flex-col > :nth-child(1) > .flex > :nth-child(3)').click();
	}

	for(let order = 0; order < 10; order++){
		cy.get('.flex-col > :nth-child(2) > .flex > :nth-child(3)').click();
	}
	for(let order = 0; order < 20; order++){
		cy.get(':nth-child(3) > .flex > :nth-child(3)').click();
	}
	cy.get('.flex-row > .justify-between > .flex > .bg-gray-800').click();

	cy.get('.mt-4 > .flex > :nth-child(1) > .w-full').type(faker.number.int({ min: 100, max: 2000}));
	cy.get('.flex > :nth-child(2) > .w-full').type(faker.person.firstName() + ' ' + faker.person.lastName());
	cy.get('.flex-row > .flex > :nth-child(3)').click();
}

function update() {
	cy.get(':nth-child(6) > div > :nth-child(1)').click();
	for(let order = 0; order < 2; order++){
		cy.get('.mt-4 > .flex-col > :nth-child(1) > .flex > :nth-child(1)').click();
	}
	for(let order = 0; order < 2; order++){
		cy.get('.flex-col > :nth-child(2) > .flex > :nth-child(1)').click();
	}
	cy.get('.flex-row > .justify-between > .flex > .bg-gray-800').click();
}

function cancelEliminar() {
	cy.get(':nth-child(2) > :nth-child(6) > div > :nth-child(2)').click();
	cy.get('.flex-row > .bg-white').click();
}

function confirmEliminar() {
	cy.get(':nth-child(2) > :nth-child(6) > div > :nth-child(2)').click();
	cy.get('.flex-row > .justify-center').click();
}

function search() {
	cy.get('.lg\\:w-3\\/5 > :nth-child(1) > .w-full').type("cola");
}