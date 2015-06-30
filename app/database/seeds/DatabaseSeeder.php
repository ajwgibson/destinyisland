<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');

		DB::table('bookings')->delete();

		Booking::create(array( 'first' => 'Lauren',		'last' => 'Conway', 	'age' => 4,  'school_year' => 'P4', 'group_number' => '1', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Emily', 		'last' => 'Henderson', 	'age' => 5,  'school_year' => 'P4', 'group_number' => '2', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Sienna', 	'last' => 'Yates', 		'age' => 6,  'school_year' => 'P4', 'group_number' => '3', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Harrison', 	'last' => 'Carroll', 	'age' => 7,  'school_year' => 'P4', 'group_number' => '4', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Taylor', 	'last' => 'Palmer', 	'age' => 8,  'school_year' => 'P4', 'group_number' => '5', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Maya', 		'last' => 'Marsh', 		'age' => 9,  'school_year' => 'P4', 'group_number' => '6', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Riley', 		'last' => 'Farmer', 	'age' => 10, 'school_year' => 'P4', 'group_number' => '1', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Amelia', 	'last' => 'Ashton', 	'age' => 11, 'school_year' => 'P4', 'group_number' => '2', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Jonathan', 	'last' => 'Riley', 		'age' => 10, 'school_year' => 'P4', 'group_number' => '3', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Anthony', 	'last' => 'Moss', 		'age' => 9,  'school_year' => 'P4', 'group_number' => '4', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Ellie', 		'last' => 'Henry', 		'age' => 8,  'school_year' => 'P1', 'group_number' => '5', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Sofia', 		'last' => 'Phillips', 	'age' => 7,  'school_year' => 'P1', 'group_number' => '6', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Owen', 		'last' => 'Bartlett', 	'age' => 6,  'school_year' => 'P1', 'group_number' => '1', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Alicia', 	'last' => 'Jordan', 	'age' => 5,  'school_year' => 'P1', 'group_number' => '2', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Peter', 		'last' => 'Hancock', 	'age' => 4,  'school_year' => 'P1', 'group_number' => '3', 'activity_1' => 'Cooking' ));
		Booking::create(array( 'first' => 'Aidan', 		'last' => 'Walker', 	'age' => 5,  'school_year' => 'P1', 'group_number' => '4', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Jennifer', 	'last' => 'Sinclair', 	'age' => 6,  'school_year' => 'P1', 'group_number' => '5', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Georgina', 	'last' => 'Henry', 		'age' => 7,  'school_year' => 'P1', 'group_number' => '6', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Jonathan', 	'last' => 'Barber', 	'age' => 8,  'school_year' => 'P1', 'group_number' => '1', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Francesca', 	'last' => 'Rice', 		'age' => 9,  'school_year' => 'P1', 'group_number' => '2', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Scott', 		'last' => 'Rowe', 		'age' => 10, 'school_year' => 'P1', 'group_number' => '3', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Nathan', 	'last' => 'Gould', 		'age' => 11, 'school_year' => 'P1', 'group_number' => '4', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Harley', 	'last' => 'May', 		'age' => 10, 'school_year' => 'P1', 'group_number' => '5', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Brandon', 	'last' => 'Riley', 		'age' => 9,  'school_year' => 'P1', 'group_number' => '6', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Brandon', 	'last' => 'Richardson', 'age' => 8,  'school_year' => 'P1', 'group_number' => '1', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Adam', 		'last' => 'Little', 	'age' => 7,  'school_year' => 'P1', 'group_number' => '2', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Matthew', 	'last' => 'Duncan', 	'age' => 6,  'school_year' => 'P1', 'group_number' => '3', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Daisy', 		'last' => 'Wall', 		'age' => 5,  'school_year' => 'P1', 'group_number' => '4', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Louis', 		'last' => 'Potts', 		'age' => 4,  'school_year' => 'P1', 'group_number' => '5', 'activity_1' => 'Sports' ));
		Booking::create(array( 'first' => 'Amelie', 	'last' => 'Bentley', 	'age' => 3,  'school_year' => 'P1', 'group_number' => '6', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Harriet', 	'last' => 'Cameron', 	'age' => 2,  'school_year' => 'P1', 'group_number' => '1', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Jude', 		'last' => 'Fraser', 	'age' => 1,  'school_year' => 'P1', 'group_number' => '2', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Aidan', 		'last' => 'Farmer', 	'age' => 2,  'school_year' => 'P1', 'group_number' => '3', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Rebecca', 	'last' => 'Wallace', 	'age' => 3,  'school_year' => 'P1', 'group_number' => '4', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Lucas', 		'last' => 'Kaur', 		'age' => 4,  'school_year' => 'P2', 'group_number' => '5', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Faith', 		'last' => 'Bartlett', 	'age' => 5,  'school_year' => 'P2', 'group_number' => '6', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Luke', 		'last' => 'Cooke', 		'age' => 6,  'school_year' => 'P2', 'group_number' => '1', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Lilly', 		'last' => 'Farrell', 	'age' => 7,  'school_year' => 'P2', 'group_number' => '2', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Peter', 		'last' => 'Boyle', 		'age' => 8,  'school_year' => 'P2', 'group_number' => '3', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'James', 		'last' => 'Kay', 		'age' => 9,  'school_year' => 'P2', 'group_number' => '4', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Nicholas', 	'last' => 'Morley', 	'age' => 10, 'school_year' => 'P2', 'group_number' => '5', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Mason', 		'last' => 'Kent', 		'age' => 11, 'school_year' => 'P2', 'group_number' => '6', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Sofia', 		'last' => 'Freeman', 	'age' => 10, 'school_year' => 'P2', 'group_number' => '1', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Isobel', 	'last' => 'Watts', 		'age' => 9,  'school_year' => 'P2', 'group_number' => '2', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Andrew', 	'last' => 'Garner', 	'age' => 8,  'school_year' => 'P2', 'group_number' => '3', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Henry', 		'last' => 'Farmer', 	'age' => 7,  'school_year' => 'P2', 'group_number' => '4', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Louie', 		'last' => 'Fowler', 	'age' => 6,  'school_year' => 'P2', 'group_number' => '5', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Amy', 		'last' => 'Doyle', 		'age' => 5,  'school_year' => 'P2', 'group_number' => '6', 'activity_1' => 'Dancing' ));
		Booking::create(array( 'first' => 'Rhys', 		'last' => 'Buckley', 	'age' => 4,  'school_year' => 'P2', 'group_number' => '1', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Bradley', 	'last' => 'Warren', 	'age' => 3,  'school_year' => 'P2', 'group_number' => '2', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Sean', 		'last' => 'Dennis', 	'age' => 2,  'school_year' => 'P2', 'group_number' => '3', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Muhammad', 	'last' => 'Murphy', 	'age' => 1,  'school_year' => 'P2', 'group_number' => '4', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Nicole', 	'last' => 'Robertson', 	'age' => 2,  'school_year' => 'P2', 'group_number' => '5', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Aidan', 		'last' => 'Hicks', 		'age' => 3,  'school_year' => 'P2', 'group_number' => '6', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Abigail', 	'last' => 'Page', 		'age' => 4,  'school_year' => 'P2', 'group_number' => '1', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Kieran', 	'last' => 'Swift', 		'age' => 5,  'school_year' => 'P2', 'group_number' => '2', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Isobel', 	'last' => 'Austin', 	'age' => 6,  'school_year' => 'P2', 'group_number' => '3', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Jake', 		'last' => 'Bradley', 	'age' => 7,  'school_year' => 'P2', 'group_number' => '4', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Yasmin', 	'last' => 'Davey', 		'age' => 8,  'school_year' => 'P3', 'group_number' => '5', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Alice', 		'last' => 'Shepherd', 	'age' => 9,  'school_year' => 'P3', 'group_number' => '6', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Taylor', 	'last' => 'Bradshaw', 	'age' => 10, 'school_year' => 'P3', 'group_number' => '1', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Kian', 		'last' => 'Payne', 		'age' => 11, 'school_year' => 'P3', 'group_number' => '2', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Sienna', 	'last' => 'Wilkins', 	'age' => 10, 'school_year' => 'P3', 'group_number' => '3', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Eleanor', 	'last' => 'Collier', 	'age' => 9,  'school_year' => 'P3', 'group_number' => '4', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Bradley', 	'last' => 'Griffiths', 	'age' => 8,  'school_year' => 'P3', 'group_number' => '5', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Jay', 		'last' => 'Black', 		'age' => 7,  'school_year' => 'P3', 'group_number' => '6', 'activity_1' => 'Loom bands' ));
		Booking::create(array( 'first' => 'Rachel', 	'last' => 'Duncan', 	'age' => 6,  'school_year' => 'P3', 'group_number' => '1', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Harriet', 	'last' => 'Chadwick', 	'age' => 5,  'school_year' => 'P3', 'group_number' => '2', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Michael', 	'last' => 'Hardy', 		'age' => 4,  'school_year' => 'P3', 'group_number' => '3', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Courtney', 	'last' => 'Kennedy', 	'age' => 3,  'school_year' => 'P3', 'group_number' => '4', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Jacob', 		'last' => 'North', 		'age' => 2,  'school_year' => 'P3', 'group_number' => '5', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Tyler', 		'last' => 'Woods', 		'age' => 1,  'school_year' => 'P3', 'group_number' => '6', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Isabelle', 	'last' => 'Smart', 		'age' => 2,  'school_year' => 'P3', 'group_number' => '1', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Aaron', 		'last' => 'Norman', 	'age' => 3,  'school_year' => 'P3', 'group_number' => '2', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Lydia', 		'last' => 'Newman', 	'age' => 4,  'school_year' => 'P3', 'group_number' => '3', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Joe', 		'last' => 'Richards', 	'age' => 4,  'school_year' => 'P3', 'group_number' => '4', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Zoe', 		'last' => 'Pollard', 	'age' => 6,  'school_year' => 'P3', 'group_number' => '5', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Sam', 		'last' => 'Burke', 		'age' => 7,  'school_year' => 'P3', 'group_number' => '6', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Isabel', 	'last' => 'Winter', 	'age' => 8,  'school_year' => 'P3', 'group_number' => '1', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Francesca', 	'last' => 'Alexander', 	'age' => 9,  'school_year' => 'P3', 'group_number' => '2', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Lily', 		'last' => 'Wall', 		'age' => 10, 'school_year' => 'P3', 'group_number' => '3', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Cameron', 	'last' => 'Miah', 		'age' => 11, 'school_year' => 'P3', 'group_number' => '4', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Summer', 	'last' => 'Khan', 		'age' => 10, 'school_year' => 'P5', 'group_number' => '5', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Rebecca', 	'last' => 'Cooke', 		'age' => 9,  'school_year' => 'P5', 'group_number' => '6', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Matthew', 	'last' => 'Davey', 		'age' => 8,  'school_year' => 'P5', 'group_number' => '1', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Daisy', 		'last' => 'Khan', 		'age' => 7,  'school_year' => 'P5', 'group_number' => '2', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Nathan', 	'last' => 'Gough', 		'age' => 6,  'school_year' => 'P5', 'group_number' => '3', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Phoebe', 	'last' => 'Shaw', 		'age' => 5,  'school_year' => 'P5', 'group_number' => '4', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Connor', 	'last' => 'Thomas', 	'age' => 4,  'school_year' => 'P5', 'group_number' => '5', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Abby', 		'last' => 'Hurst', 		'age' => 5,  'school_year' => 'P5', 'group_number' => '6', 'activity_1' => 'Crafts' ));
		Booking::create(array( 'first' => 'Toby', 		'last' => 'Simmons', 	'age' => 6,  'school_year' => 'P5', 'group_number' => '1', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Brooke', 	'last' => 'Shah', 		'age' => 7,  'school_year' => 'P5', 'group_number' => '2', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Mia', 		'last' => 'Anderson', 	'age' => 8,  'school_year' => 'P5', 'group_number' => '3', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Luca', 		'last' => "O'Sullivan", 'age' => 9,  'school_year' => 'P5', 'group_number' => '4', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Zachary', 	'last' => 'Welch', 		'age' => 10, 'school_year' => 'P5', 'group_number' => '5', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Alex', 		'last' => 'Baker', 		'age' => 11, 'school_year' => 'P5', 'group_number' => '6', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Eve', 		'last' => 'Wilkinson', 	'age' => 10, 'school_year' => 'P5', 'group_number' => '1', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Oscar', 		'last' => 'Parkinson', 	'age' => 9,  'school_year' => 'P5', 'group_number' => '2', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Alex', 		'last' => 'Butcher', 	'age' => 8,  'school_year' => 'P5', 'group_number' => '3', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Zara', 		'last' => 'Miller', 	'age' => 7,  'school_year' => 'P5', 'group_number' => '4', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Rosie', 		'last' => 'Smith', 		'age' => 6,  'school_year' => 'P5', 'group_number' => '5', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Aaliyah', 	'last' => 'Morrison', 	'age' => 5,  'school_year' => 'P5', 'group_number' => '6', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Adam', 		'last' => 'Fisher', 	'age' => 4,  'school_year' => 'P5', 'group_number' => '1', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Louise', 	'last' => 'Francis', 	'age' => 5,  'school_year' => 'P5', 'group_number' => '2', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Riley', 		'last' => 'James', 		'age' => 6,  'school_year' => 'P5', 'group_number' => '3', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Gabriel', 	'last' => 'Andrews', 	'age' => 7,  'school_year' => 'P5', 'group_number' => '4', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Millie', 	'last' => 'Fry', 		'age' => 8,  'school_year' => 'P6', 'group_number' => '5', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Patrick', 	'last' => 'Carr', 		'age' => 9,  'school_year' => 'P6', 'group_number' => '6', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Sofia', 		'last' => 'Gould', 		'age' => 10, 'school_year' => 'P6', 'group_number' => '1', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Ethan', 		'last' => 'Humphries', 	'age' => 11, 'school_year' => 'P6', 'group_number' => '2', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Liam', 		'last' => 'Douglas', 	'age' => 10, 'school_year' => 'P6', 'group_number' => '3', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Taylor', 	'last' => 'Brady', 		'age' => 9,  'school_year' => 'P6', 'group_number' => '4', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Yasmin', 	'last' => 'Hurst', 		'age' => 8,  'school_year' => 'P6', 'group_number' => '5', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Rosie', 		'last' => "O'Neill", 	'age' => 7,  'school_year' => 'P6', 'group_number' => '6', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Demi', 		'last' => 'Pickering', 	'age' => 6,  'school_year' => 'P6', 'group_number' => '1', 'activity_1' => 'Singing and drama' ));
		Booking::create(array( 'first' => 'Shannon', 	'last' => 'Shaw', 		'age' => 5,  'school_year' => 'P6', 'group_number' => '1', 'activity_1' => 'Singing and drama' ));
	}

}
