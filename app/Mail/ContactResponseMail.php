namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactResponse;

class ContactResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $response;

    public function __construct(ContactResponse $response)
    {
        $this->response = $response;
    }

    public function build()
    {
        return $this->subject('Response to your contact message')
                    ->view('emails.contact_response');
    }
}
