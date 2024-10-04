import { faker } from "@faker-js/faker";
import { users } from "../../data/users";

describe("Users test", () => {
	before(() =>cy.login());

	it("page users", () => {
		cy.get('.justify-between > :nth-child(1) > :nth-child(3) > .inline-flex').click(); cy.wait(2000);
		create(); cy.wait(1000);
		update(); cy.wait(1000);
		buscarPorNombre();
	})
});

function create() {
	for (const user of users()) {
		cy.get('.lg\\:w-3\\/5 > .justify-between > .flex > .inline-flex').click();

		if( user.name == "" || user.lastname == "" || user.email == "" ) {
			cy.get('.space-x-2 > .bg-white').click();
			continue;
		}

		cy.get('.mt-4 > .flex > :nth-child(1) > .w-full').type(user.name); cy.wait(1000);
		cy.get('.flex > :nth-child(2) > .w-full').type(user.lastname); cy.wait(1000);
		cy.get('select').select(user.role); cy.wait(1000);
		cy.get('.flex > :nth-child(4) > .w-full').type(user.email); cy.wait(1000);
		cy.get(':nth-child(5) > .w-full').type(user.password); cy.wait(1000);
		cy.get('.space-x-2 > .bg-gray-800').click();
		cy.wait(1500);
	}
}

function update() {
	cy.get(':nth-child(1) > :nth-child(5) > div > :nth-child(1)').click();

	const name = faker.person.firstName();
	const email = faker.internet.email();
	if(name == "" || email == "") {
		cy.get('.space-x-2 > .bg-white').click();
		return;
	}

	cy.get('.mt-4 > .flex > :nth-child(1) > .w-full').clear();
	cy.get('.mt-4 > .flex > :nth-child(1) > .w-full').type(name); cy.wait(1000);
	cy.get('.flex > :nth-child(4) > .w-full').clear();
	cy.get('.flex > :nth-child(4) > .w-full').type(email); cy.wait(1000);
	cy.get(':nth-child(5) > .w-full').type("12345678"); cy.wait(1000);
	cy.get('.space-x-2 > .bg-gray-800').click();
}

function cancelarEliminacion() {
	cy.get(':nth-child(1) > :nth-child(5) > div > :nth-child(2)').click();
	cy.get('.flex-row > .bg-white').click();
}

function confirmarEliminacion() {
	cy.get(':nth-child(1) > :nth-child(5) > div > :nth-child(2)').click();
	cy.get('.flex-row > .justify-center').click();
}

function buscarPorNombre() {
	const name = faker.person.firstName();
	cy.get('.justify-between > .w-full').type(name);
}