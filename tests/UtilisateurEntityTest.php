<?php

use entity\UtilisateurEntity;
use PHPUnit\Framework\TestCase;

require_once('entity/UtilisateurEntity.php');

final class UtilisateurEntityTest extends TestCase
{

    public function testCheckDataNormalSet(): array
    {
        $user = new UtilisateurEntity();
        $stack = [
            'login_u' => 'roro',
            'nom_u' => 'Arbona ',
            'prenom_u' => 'Robin',
            'numero_rue_adresse_u' => '6',
            'nom_rue_adresse_u' => 'Avenue de la corse',
            'ville_adresse_u' => 'Marseille',
            'postal_adresse_u' => '13007',
            'mail_u' => 'arbona.robin@gmail.com',
            'telephone_u' => '0633660712',
            'motdepass_u' => 'robin-123',
            'motdepass_u_conf' => 'robin-123'
        ];
        $this->assertTrue($user->checkData($stack));

        return $stack;
    }

    /**
     * @depends testCheckDataNormalSet
     */
    public function testCheckDataEmptyFields(array $stack): array
    {
        $user = new UtilisateurEntity();

        foreach ($stack as $key => &$value) {
            $tmp = $value;
            $value = '';
            $this->assertIsArray($user->checkData($stack), 'Failed when test:' . $key);
            $value = $tmp;
        }

        return $stack;
    }

    /**
     * @depends testCheckDataEmptyFields
     */
    public function testCheckDataEmail(array $stack): array
    {
        $user = new UtilisateurEntity();

        $emails = [
            'robin',
            'robin.com',
            '@.com',
        ];

        $tmp = $stack['mail_u'];


        foreach ($emails as $email) {
            $stack['mail_u'] = $email;
            $this->assertIsArray($user->checkData($stack), 'Failed when tested:' . $email);
        }

        $stack['mail_u'] = $tmp;

        return $stack;
    }

    /**
     * @depends testCheckDataEmail
     */
    public function testCheckDataPasswordsEqual(array $stack): array
    {
        $user = new UtilisateurEntity();
        $tmp = $stack['motdepass_u_conf'];

        $stack['motdepass_u_conf'] = 'lala';

        $this->assertEquals(1, count($user->checkData($stack)), 'Password equality');

        $stack['motdepass_u_conf'] = $tmp;
        return $stack;
    }
}
