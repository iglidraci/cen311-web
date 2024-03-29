<?php

/**
 * password_hash() creates a password hash using a strong one-way hashing algorithm
 * password_hash(string $password, string|int|null $algo, array $options = []): string
 * The following algorithms are currently supported:
 * 1) PASSWORD_DEFAULT - Use the bcrypt algorithm
 * 2) PASSWORD_BCRYPT - Use the CRYPT_BLOWFISH algorithm to create the hash
 * 3) PASSWORD_ARGON2I - Use the Argon2i hashing algorithm to create the hash
 * 4) PASSWORD_ARGON2ID - Use the Argon2id hashing algorithm to create the hash.
 *
 * Supported options for PASSWORD_BCRYPT
 * 1) salt (string) - to manually provide a salt to use when hashing the password.
 * Note that this will override and prevent a salt from being automatically generated
 * If omitted, a random salt will be generated by password_hash() for each password hashed.
 * This is the intended mode of operation
 * 2) cost (int) - which denotes the algorithmic cost that should be used
 */

$password = 'test2023';

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

echo $hashed_password . '<br>';

if(password_verify($password, $hashed_password)) {
    echo 'correct password';
} else {
    echo 'wrong password';
}


