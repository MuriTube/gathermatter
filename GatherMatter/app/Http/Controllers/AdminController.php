<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    // Die index-Methode. Diese Methode wird aufgerufen, wenn eine GET-Anfrage an die URL /admin gesendet wird.
    public function index()
    {
       // Ruft alle Benutzer aus der Datenbank ab, außer dem aktuell angemeldeten Benutzer.
            $users = User::where('id', '!=', auth()->id())->get();
            return view('admin.index', ['users' => $users]);
    }

    // Die show-Methode. Diese Methode wird aufgerufen, wenn eine GET-Anfrage an die URL /admin/{user} gesendet wird.
    // Der {user}-Parameter in der URL wird automatisch durch eine Instanz des User-Models ersetzt, die die angegebene ID hat.
    public function show(User $user)
    {
        // Gibt die View 'admin.show' zurück und übergibt die Variable $user an die View.
        return view('admin.show', ['user' => $user]);
    }

    // Die update-Methode. Diese Methode wird aufgerufen, wenn eine PATCH- oder PUT-Anfrage an die URL /admin/{user} gesendet wird.
    // Der {user}-Parameter in der URL wird automatisch durch eine Instanz des User-Models ersetzt, die die angegebene ID hat.
    // Die Request-Instanz enthält die Daten, die in der Anfrage gesendet wurden.
    public function update(Request $request, User $user)
    {
        // Aktualisiert das User-Model mit den Daten aus der Anfrage. In diesem Fall wird nur das 'role'-Feld aktualisiert.
        $user->update($request->only('role'));
        
        // Leitet den Benutzer zurück zur vorherigen Seite und fügt eine Statusmeldung zur Sitzung hinzu.
        return back()->with('status', 'Benutzerrolle wurde erfolgreich aktualisiert.');
    }
    /**
     * Update the specified user profile by the admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     */
    public function updateProfile(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|max:255',
        'firstname' => 'required|max:255',
        'surname' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'telefon' => 'nullable|max:255',
        'zip' => 'required|max:10',
        'city' => 'required|max:255',
    ]);

    $user->fill($request->all());
    $user->save();

    return redirect()->route('admin.show', $user)->with('status', 'Benutzerprofil wurde erfolgreich aktualisiert!');
}
    // Die destroy-Methode. Diese Methode wird aufgerufen, wenn eine DELETE-Anfrage an die URL /admin/{user} gesendet wird.
    // Der {user}-Parameter in der URL wird automatisch durch eine Instanz des User-Models ersetzt, die die angegebene ID hat.
    public function destroy(User $user)
    {
        // Löscht das User-Model.
        $user->delete();

        // Leitet den Benutzer zurück zur vorherigen Seite und fügt eine Statusmeldung zur Sitzung hinzu.
        return redirect('/admin')->with('status', 'Benutzer wurde erfolgreich gelöscht.');
    }
}
