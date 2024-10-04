import { faker } from '@faker-js/faker';

export const users = () => {
	const arrayUsers = [];
	for(let i = 0; i < 3; i++){
		arrayUsers.push({
			"name"		: faker.person.firstName(),
			"lastname"	: faker.person.lastName(),
			"role"		: faker.helpers.arrayElement(['Cajero', 'Administrador']),
			"email"		: faker.internet.email(),
			"password"	: '12345678',
		})
	}
	return arrayUsers;
}