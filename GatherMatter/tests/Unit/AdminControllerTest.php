<?php

namespace Tests\Unit;

use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class AdminControllerTest extends TestCase
{
   
    /**
     * Test the updateProfile method of AdminController.
     */
    public function testUpdateUserByAdmin()
{
    // Mocken des User-Models
    $user = $this->createMock(User::class);
    
    // Erstellen eines Stub-Objekts des Request-Objekts
    $request = $this->getMockBuilder(Request::class)
        ->getMockForAbstractClass();
    
    // Konfigurieren des Stub-Objekts und Rückgabe der validierten Daten
    $request->expects($this->once())
        ->method('validate')
        ->willReturn([
            'name' => 'John Doe',
            'role' => 'admin'
        ]);
    
    // Aktualisieren der Rolleninformationen des Benutzers
    $user->expects($this->once())
        ->method('update')
        ->with(['role' => 'admin']);
    
    // Erstellen einer Instanz des AdminControllers
    $controller = new AdminController();
    
    // Aufrufen der update-Methode des AdminControllers
    $response = $controller->update($request, $user);
    
    // Überprüfen der erwarteten Antwort
    $this->assertInstanceOf(RedirectResponse::class, $response);
    $this->assertEquals(url()->previous(), $response->getTargetUrl());
    $this->assertSessionHas('status', 'Benutzerrolle wurde erfolgreich aktualisiert.');
}

}
