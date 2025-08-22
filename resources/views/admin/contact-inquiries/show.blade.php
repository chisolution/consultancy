<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contact Inquiry: {{ $contactInquiry->reference }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.contact-inquiries.edit', $contactInquiry) }}" 
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit
                </a>
                <a href="{{ route('admin.contact-inquiries.index') }}" 
                   class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Contact Information -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Contact Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Name</label>
                                    <div class="mt-1 text-sm text-gray-900">{{ $contactInquiry->name }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <div class="mt-1 text-sm text-gray-900">
                                        <a href="mailto:{{ $contactInquiry->email }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $contactInquiry->email }}
                                        </a>
                                    </div>
                                </div>
                                @if($contactInquiry->phone)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                                        <div class="mt-1 text-sm text-gray-900">
                                            <a href="tel:{{ $contactInquiry->phone }}" class="text-blue-600 hover:text-blue-800">
                                                {{ $contactInquiry->phone }}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if($contactInquiry->company)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Company</label>
                                        <div class="mt-1 text-sm text-gray-900">{{ $contactInquiry->company }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Message</h3>
                            <div class="prose max-w-none">
                                <p class="text-gray-700 whitespace-pre-wrap">{{ $contactInquiry->message }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Technical Information -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Technical Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">IP Address</label>
                                    <div class="mt-1 text-gray-900">{{ $contactInquiry->ip_address ?? 'N/A' }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Locale</label>
                                    <div class="mt-1 text-gray-900">{{ $contactInquiry->locale ?? 'N/A' }}</div>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">User Agent</label>
                                    <div class="mt-1 text-gray-900 text-xs break-all">{{ $contactInquiry->user_agent ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Status Information -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Status Information</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Reference</label>
                                    <div class="mt-1 text-sm font-mono text-gray-900">{{ $contactInquiry->reference }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Status</label>
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($contactInquiry->status === 'new') bg-green-100 text-green-800
                                            @elseif($contactInquiry->status === 'in_progress') bg-yellow-100 text-yellow-800
                                            @elseif($contactInquiry->status === 'responded') bg-blue-100 text-blue-800
                                            @elseif($contactInquiry->status === 'closed') bg-gray-100 text-gray-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ ucfirst($contactInquiry->status) }}
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Priority</label>
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($contactInquiry->priority === 'urgent') bg-red-100 text-red-800
                                            @elseif($contactInquiry->priority === 'high') bg-orange-100 text-orange-800
                                            @elseif($contactInquiry->priority === 'medium') bg-yellow-100 text-yellow-800
                                            @else bg-green-100 text-green-800
                                            @endif">
                                            {{ ucfirst($contactInquiry->priority) }}
                                        </span>
                                    </div>
                                </div>
                                @if($contactInquiry->service)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Service Interest</label>
                                        <div class="mt-1 text-sm text-gray-900">
                                            {{ ucfirst(str_replace('_', ' ', $contactInquiry->service)) }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Timestamps -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Timeline</h3>
                            <div class="space-y-3 text-sm">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Created</label>
                                    <div class="mt-1 text-gray-900">
                                        {{ $contactInquiry->created_at->format('M j, Y \a\t H:i') }}
                                        <div class="text-xs text-gray-500">{{ $contactInquiry->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                                    <div class="mt-1 text-gray-900">
                                        {{ $contactInquiry->updated_at->format('M j, Y \a\t H:i') }}
                                        <div class="text-xs text-gray-500">{{ $contactInquiry->updated_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                @if($contactInquiry->responded_at)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Responded</label>
                                        <div class="mt-1 text-gray-900">
                                            {{ $contactInquiry->responded_at->format('M j, Y \a\t H:i') }}
                                            <div class="text-xs text-gray-500">{{ $contactInquiry->responded_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>
                            <div class="space-y-2">
                                <a href="mailto:{{ $contactInquiry->email }}?subject=Re: {{ $contactInquiry->reference }}" 
                                   class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center block">
                                    Reply via Email
                                </a>
                                @if($contactInquiry->phone)
                                    <a href="tel:{{ $contactInquiry->phone }}" 
                                       class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-center block">
                                        Call Customer
                                    </a>
                                @endif
                                <form method="POST" action="{{ route('admin.contact-inquiries.destroy', $contactInquiry) }}" 
                                      onsubmit="return confirm('Are you sure you want to delete this inquiry?')" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Delete Inquiry
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
